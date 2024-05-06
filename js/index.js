function getNames(){
    let blockSel = document.querySelectorAll('.top__list');
    let connect = new XMLHttpRequest();
    connect.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data = this.responseText;

            blockSel[0].innerHTML = data;
        };
    };
    connect.open("POST", "html/select-html.php", true);
    connect.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    connect.send();
}
getNames();

function sendData(){
    let getId = document.querySelectorAll('.select__list');
    let blockTable = document.querySelectorAll('.bottom__table');

    let jsonobj = getId[0].value;
    let data = JSON.stringify(jsonobj);
    let body = "settingData=" + encodeURIComponent(data);
    let connect = new XMLHttpRequest();
    connect.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data = this.responseText;

            blockTable[0].innerHTML = data;
        };
    };
    connect.open("POST", "html/table-html.php", true);
    connect.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    connect.send(body);
}