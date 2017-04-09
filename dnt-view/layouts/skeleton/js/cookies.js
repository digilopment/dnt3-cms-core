	/*function pollThisDomain() {
       var domena_all = document.domain.split(".sk")[0];
       var domena = domena_all.split(".");
       var lastItem = domena.pop();
       return lastItem;
   }

   function pollDeleteCookie(name) {
       createCookie(name, "", -1);
   }

   function pollSetCookie(cname, cvalue, exMinutes) {
       var d = new Date();
       d.setTime(d.getTime() + (exMinutes * 60 * 1000));
       var expires = "expires=" + d.toGMTString();
       document.cookie = cname + "=" + cvalue + ";path=/;domain=" + pollThisDomain() + ".sk; " + expires;
   }

   function pollGetCookie(cname) {
       var name = cname + "=";
       var ca = document.cookie.split(';');
       for (var i = 0; i < ca.length; i++) {
           var c = ca[i];
           while (c.charAt(0) == ' ') c = c.substring(1);
           if (c.indexOf(name) == 0) {
               return c.substring(name.length, c.length);
           }
       }
       return "";
   }

   function pollCheckCookie() {
       var user = getCookie("username");
       if (user != "") {
           alert("Welcome again " + user);
       } else {
           user = prompt("Please enter your name:", "");
           if (user != "" && user != null) {
               pollSetCookie("username", user, 30);
           }
       }
   }

   function pollIsCookie(name) {

       var myCookie = getCookie(name);

       if (myCookie != "") {
           return true;
       } else {
           return false;
       }
   }

   function pollSetCookie(cname, cvalue, exMinutes) {
       var d = new Date();
       d.setTime(d.getTime() + (exMinutes * 60 * 1000));
       var expires = "expires=" + d.toGMTString();
       document.cookie = cname + "=" + cvalue + ";path=/;domain=" + pollThisDomain() + "; " + expires;
   }
   
   */
   
   function pollSetCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}