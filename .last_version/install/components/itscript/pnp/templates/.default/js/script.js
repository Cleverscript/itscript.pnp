document.addEventListener("DOMContentLoaded", function() {

    BX.PULL.subscribe({
        moduleId: jsparams.PNP_MODULE_ID,
        callback: function (data) {
            writeResponse('BX.PULL.subscribe -> ' + jsparams.PNP_MODULE_ID, data);

            console.log('BX.PULL.subscribe');
            console.log(data);

        }.bind(this)
    });

});

function writeResponse(method, data, status = true) {
    var msg = 'Catch event <b class="event">' + method + '</b> with data:<br/>';

    if ((typeof data) == 'string') {
        msg += data;
    } else if((typeof data) == 'object') {
        
        for (var key in data) {
            if ((typeof data[key]) == 'object') {

                //alert(key);
                //console.log(data[key]);

                for (var k in data[key]) {
                    if ((typeof data[key][k]) == 'object' /*|| (typeof data[key][k]) == array*/) {
                        msg += k + ' => ' + '<em>' + JSON.stringify(data[key][k]) + '</em><br/>';
                    } else {
                        msg += k + ' => ' + '<em>' + data[key][k] + '</em><br/>';
                    }
                }

            } else {
                msg += key + ' => ' + '<em>' + data[key] + '</em><br/>';
            }
        };
    }

    document.getElementById('result-js').innerHTML += msg + '- - - - - -<br/>';
}

function writeSend(method, data, status = true) {
    var msg = 'Call method <b class="method">' + method + '</b> with params:<br/>';

    if ((typeof data) == 'string') {
        msg += data;
    } else if((typeof data) == 'object') {
        
        for (var key in data) {
            msg += key + ' => ' + '<em>' + data[key] + '</em><br/>';
        };
    }

    document.getElementById('result-js').innerHTML += msg + '- - - - - -<br/>';
}

function runAddSharedControllerAction(mid, cmd, params) {
    let dataObj = {
        mid: mid, 
        cmd: cmd, 
        params: params
    };
    BX.ajax.runAction('itscript:pnp.Controller.Test.shared', {
        data: dataObj
    }).then(function (response) { // status == 'success'
        writeSend('CPullStack::AddShared', dataObj);
        console.log(response);
    }, function (response) { // status !== 'success'
        console.log(response);
    });
}

function runAddByUserControllerAction(mid, uid, cmd, params) {
    let dataObj = {
        mid: mid,
        uid: uid, 
        cmd: cmd, 
        params: params
    };
    BX.ajax.runAction('itscript:pnp.Controller.Test.addbyuser', {
        data: dataObj
    }).then(function (response) { // status == 'success'
        writeSend('CPullStack::AddByUser', dataObj);
        console.log(response);
    }, function (response) { // status !== 'success'
        console.log(response);
    });
}

// send only mobile
function runAddQueueControllerAction(mid, uid, mess, tag, subTag) {
    let dataObj = {
        mid: mid,
        uid: uid, 
        mess: mess, 
        tag: tag, 
        subTag: subTag
    };
    BX.ajax.runAction('itscript:pnp.Test.queue', {
        data: dataObj
    }).then(function (response) { // status == 'success'
        writeSend('CPushManager::AddQueue', dataObj);
        console.log(response);
    }, function (response) { // status !== 'success'
        console.log(response);
    });
}


// Обработчики для кнопок
document.addEventListener("DOMContentLoaded", function() {

    // AddShared
    document.getElementById('addShared-btn-js').addEventListener('click', (el) => {
        runAddSharedControllerAction(
            jsparams.PNP_MODULE_ID, 
            jsparams.PNP_CMD,
            document.getElementById('pnp-params-js').value
        );
    });

    // AddByUser
    document.getElementById('addBuyUser-btn-js').addEventListener('click', (el) => {
        runAddByUserControllerAction(
            jsparams.PNP_MODULE_ID, 
            jsparams.PNP_USER_ID, 
            jsparams.PNP_CMD,
            document.getElementById('pnp-params-js').value
        );
    });

    // AddQueue (only mobile)
    document.getElementById('addQueue-btn-js').addEventListener('click', (el) => {
        runAddQueueControllerAction(
            jsparams.PNP_MODULE_ID, 
            jsparams.PNP_USER_ID, 
            jsparams.PNP_MESSAGE, 
            jsparams.PNP_TAG, 
            jsparams.PNP_TAG_SUB
        );
    });
});
