/*
*
* GENERAL SETTING
*
*/
let mysql = require('mysql');
let connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'root',
    database: 'DISMI_FINAL'
});
connection.connect(function(err) {
    if (err) {
        return console.error('error: ' + err.message);
    }
    
    console.log('Connected to the MySQL server.');
});

var LocalStorage = require('node-localstorage').LocalStorage,
localStorage = new LocalStorage('./scratch');









// create an empty modbus client
var ModbusRTU = require("modbus-serial");
var client = new ModbusRTU();
 
// open connection to a tcp line
var plc__ip = GetSystemSetting('plc__ip');
var plc__port = parseInt(GetSystemSetting('plc__port'));
client.connectTCP(plc__ip, { port: plc__port });
client.setID(1);
 
// read the values of 10 registers starting at address 0
// on device number 1. and log the values to the console.
setInterval(function() {

    /*
    *
    * READ KWH AND STORE TO DATABASE
    *
    */
    // klo mau mulai pantai di 110, maka yang harus dimasukan di sini adalah 109
    // var kwh_address_start = 101;
    // var kwh_long = 100;

    var kwh_address_start = parseInt(GetSystemSetting('kwh_address_start'));
    var kwh_long = parseInt(GetSystemSetting('kwh_address_long'));
    var blinker_buffer_time = parseInt(GetSystemSetting('blinker_buffer_time'));

    client.readHoldingRegisters(kwh_address_start, kwh_long, function(err, data) {

        if( err ){
            return console.log(err);
        }

        console.log(data.data);

        var currentdate = new Date();
        var final_current_date = currentdate.getFullYear() 
        + "-"
        + (currentdate.getMonth()+1)  
        + "-" 
        + currentdate.getDate() 
        + " "
        + currentdate.getHours() + ":"  
        + currentdate.getMinutes() + ":" 
        + currentdate.getSeconds();

        let insert_sql = "insert into d3s3m_energy_logger (elog_KWH_ADDRESS_START, elog_KWH_LONG, elog_KWH_STREAM, elog_DATE_CREATED) values('"+kwh_address_start+"', '"+kwh_long+"', '"+data.data+"', '"+final_current_date+"') ";
        connection.query(insert_sql, function (err, result) {
            if (err) throw err;
            // console.log("1 record inserted");
            // console.log(insert_sql);
            });
    });





    /*
    *
    * AUTO BLINKER
    * 
    */
    let sql_auto_blinker = "\
    select * \
    from d3s3m_event \
    left join d3s3m_room on roo_ID = eve_d3s3m_room_roo_ID \
    where \
        eve_IS_START = 1 \
        and eve_DATE_START is not null \
        and eve_STATUS = 6 \
        and DATE_SUB(eve_EVENT_FINISH, INTERVAL "+blinker_buffer_time+" MINUTE) <= NOW() \
        and eve_EVENT_FINISH >= NOW() \
    ";
    connection.query(sql_auto_blinker, (error, results, fields) => {
        if (error) {
            return console.error(error.message);
        }

        if( results.length > 0 ){

            var array_blinker__event_id = new Array();

            for( i=0;i<results.length;i++ ){
                var this_event_id = results[i].eve_ID;
                array_blinker__event_id[i] = this_event_id;

                // POWER UP
                client.writeRegisters(results[i].roo_BLINKING_ADDRESS, [1, 0xffff]);
                console.log("Power up blinker address: "+results[i].roo_BLINKING_ADDRESS);
                // END POWER UP
            }
            var implode_array_event_id_for_blinker = array_blinker__event_id.join();
            ExecuteStartEventCURL(implode_array_event_id_for_blinker);
            console.log("\n")
            console.log("Initiate blinker for Event ID: "+implode_array_event_id_for_blinker);

        }

    });




    /*
    *
    * AUTO START EVENT
    * 
    */
    let sql_auto_start = "\
    select * \
    from d3s3m_event \
    left join d3s3m_room on roo_ID = eve_d3s3m_room_roo_ID \
    where \
        eve_IS_START = 1 \
        and eve_DATE_START is null \
        and eve_STATUS = 2 \
    ";
    connection.query(sql_auto_start, (error, results, fields) => {
        if (error) {
            return console.error(error.message);
        }
    
        if( results.length > 0 ){

            var array_start__event_id = new Array();

            for( i=0;i<results.length;i++ ){
                var this_event_id = results[i].eve_ID;
                array_start__event_id[i] = this_event_id;

                // POWER UP
                client.writeRegisters(results[i].roo_POWER_ADDRESS, [1, 0xffff]);
                client.writeRegisters(results[i].roo_POWER_ADDRESS_AC, [1, 0xffff]);
                console.log("Power up electricity address: "+results[i].roo_POWER_ADDRESS);
                console.log("Power up air conditioner address: "+results[i].roo_POWER_ADDRESS_AC);
                // END POWER UP
            }
            var implode_array_event_id_for_starting = array_start__event_id.join();
            ExecuteStartEventCURL(implode_array_event_id_for_starting);
            console.log("\n")
            console.log("Starting Event ID: "+implode_array_event_id_for_starting);

        }

    });






    /*
    *
    * AUTO STOP EVENT
    *
    */
    let sql = "\
    SELECT * \
    FROM d3s3m_event \
    left join \
        d3s3m_room on roo_ID = eve_d3s3m_room_roo_ID \
    where \
        (\
            eve_EVENT_START <= NOW() \
            and eve_IS_START = 1 \
            and eve_IS_FINISH is null \
            and eve_EVENT_FINISH <= NOW() \
            and eve_IS_EXTENDED is null \
            and eve_STATUS = 6 \
        )\
        OR \
        (\
            eve_STATUS = 4 \
            and eve_IS_FINISH is null \
            and eve_DATE_FINISH is null \
            and eve_IS_EXTENDED is null \
        )\
    ";
    // console.log(sql);
    connection.query(sql, (error, results, fields) => {
        if (error) {
            return console.error(error.message);
        }

        if( results.length > 0 ){

            
            var array_stop__event_id = new Array();
            var array_stop__kwh_listrik = new Array();
            var array_stop__kwh_ac = new Array();
            var array_stop__power_listrik = new Array();
            var array_stop__power_ac = new Array();
            var array_stop__blinker = new Array();

            for( i=0;i<results.length;i++ ){

                // console.log("Turn off Event ID: "+results[i].eve_ID);

                var this_event_id = results[i].eve_ID;
                var this_power_listrik = results[i].roo_POWER_ADDRESS;
                var this_power_ac = results[i].roo_POWER_ADDRESS_AC;
                var this_blinker = results[i].roo_BLINKING_ADDRESS;
                // var this_kwh_listrik = results[i].roo_KWH_ADDRESS;
                // var this_kwh_ac = results[i].roo_KWH_ADDRESS_AC;
                // var this_event_start = results[i].eve_DATE_START;

                array_stop__event_id[i] = this_event_id;

                // SIGNAL POWER OFF
                client.writeRegisters(this_power_listrik, [0, 0xffff]);
                client.writeRegisters(this_power_ac, [0, 0xffff]);
                client.writeRegisters(this_blinker, [0, 0xffff]);
                // klo mau write, start dengan angka ganjil
                // klo mau write di 40122, maka address nya adalah 121
                // END SIGNAL POWER OFF

                // UPDATE STATUS IS FINISH
                let update_finish = "update d3s3m_event set eve_IS_FINISH = 1, eve_DATE_FINISH = NOW(), eve_STATUS = 4 where eve_ID = "+this_event_id;
                connection.query(update_finish, (error, results, fields) => {
                    if(error){
                        return console.error(error.message);
                    }
                });
                // END UPDATE STATUS IS FINISH

            }

            var implode_array_event_id_for_stopping = array_stop__event_id.join();
            ExecuteStopEventCURL(implode_array_event_id_for_stopping);
            console.log("\n")
            console.log("Stopping Event ID: "+implode_array_event_id_for_stopping);

        }
        
    });





}, 1000);




function ConvertDate(mysqldate){
    
    const getFormattedDate = (date) => {
        return `${date.getFullYear()}-${padNumber(date.getMonth() + 1)}-${padNumber(date.getDate())} ${padNumber(date.getHours())}:${padNumber(date.getMinutes())}:${padNumber(date.getSeconds())}`;
    }
    
    const padNumber = (number) => {
        return number < 10 ? "0" + number : number;
    }

    new_final_date = new Date(mysqldate);
    // new_final_date.setHours(new_final_date.getHours()+7)

    var final_date_format = getFormattedDate(new Date(new_final_date));

    // console.log(final_date_format);

    return final_date_format;

}


function ExecuteStopEventCURL(implode_event_id){
    var request = require('request');
    var options = {
    'method': 'GET',
    'url': 'http://localhost/development_site/DISMI/public/event/panel/'+implode_event_id+'/Panel_StopEvent__Auto_Nodejs',
    'headers': {
    }
    };
    request(options, function (error, response) { 
        if (error) throw new Error(error);
        // console.log(response.body);
    });
}


function ExecuteStartEventCURL(implode_event_id){
    var request = require('request');
    var options = {
    'method': 'GET',
    'url': 'http://localhost/development_site/DISMI/public/event/panel/'+implode_event_id+'/Panel_StartEvent__Auto_Nodejs',
    'headers': {
    }
    };
    request(options, function (error, response) { 
        if (error) throw new Error(error);
        // console.log(response.body);
    });
}


function GetSystemSetting(meta_name){

    let query_get_system_setting = "select * from d3s3m_system_setting where set_META_NAME = '"+meta_name+"' ";
    connection.query(query_get_system_setting, (error, results, fields) => {
        if (error) {
            return console.error(error.message);
        }
        localStorage.setItem(meta_name, results[0].set_META_VALUE);
    });

    return localStorage.getItem(meta_name);

}