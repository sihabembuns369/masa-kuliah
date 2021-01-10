var pathweb ="http://sihabembuns.com/mbaknovi2/";
var login = pathweb + "Api/login";
var getbuku = pathweb + "Api/bukuJSON";
var pengarang = pathweb + "Api/pengarangJSON";
var getpenerbit =pathweb+"Api/penerbitJSON";
var tambahbuku =pathweb+"Api/tambahJSON";
// var getbuku =pathweb+"api/bukuJSON";
// var getpengarang =pathweb+"api/pengarangJSON";


function ceklogin(){
    if(localStorage.sihab=='' ||localStorage.sihab == undefined){
        window.location.href='login.html';
    }else{
        $('#tempatnama').html('selamat datang :'+ localStorage.sihab);
    }
}


function logout(){
    localStorage.removeItem("sihab");
        window.location.href='login.html';
    
}