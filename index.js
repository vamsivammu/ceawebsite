/* Modernizr 2.6.2 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-csstransforms3d-touch-shiv-cssclasses-prefixed-teststyles-testprop-testallprops-prefixes-domprefixes-load
 */
;window.Modernizr=function(a,b,c){function z(a){j.cssText=a}function A(a,b){return z(m.join(a+";")+(b||""))}function B(a,b){return typeof a===b}function C(a,b){return!!~(""+a).indexOf(b)}function D(a,b){for(var d in a){var e=a[d];if(!C(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function E(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:B(f,"function")?f.bind(d||b):f}return!1}function F(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+o.join(d+" ")+d).split(" ");return B(b,"string")||B(b,"undefined")?D(e,b):(e=(a+" "+p.join(d+" ")+d).split(" "),E(e,b,c))}var d="2.6.2",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n="Webkit Moz O ms",o=n.split(" "),p=n.toLowerCase().split(" "),q={},r={},s={},t=[],u=t.slice,v,w=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},x={}.hasOwnProperty,y;!B(x,"undefined")&&!B(x.call,"undefined")?y=function(a,b){return x.call(a,b)}:y=function(a,b){return b in a&&B(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=u.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(u.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(u.call(arguments)))};return e}),q.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:w(["@media (",m.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c},q.csstransforms3d=function(){var a=!!F("perspective");return a&&"webkitPerspective"in g.style&&w("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(b,c){a=b.offsetLeft===9&&b.offsetHeight===3}),a};for(var G in q)y(q,G)&&(v=G.toLowerCase(),e[v]=q[G](),t.push((e[v]?"":"no-")+v));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)y(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},z(""),i=k=null,function(a,b){function k(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function l(){var a=r.elements;return typeof a=="string"?a.split(" "):a}function m(a){var b=i[a[g]];return b||(b={},h++,a[g]=h,i[h]=b),b}function n(a,c,f){c||(c=b);if(j)return c.createElement(a);f||(f=m(c));var g;return f.cache[a]?g=f.cache[a].cloneNode():e.test(a)?g=(f.cache[a]=f.createElem(a)).cloneNode():g=f.createElem(a),g.canHaveChildren&&!d.test(a)?f.frag.appendChild(g):g}function o(a,c){a||(a=b);if(j)return a.createDocumentFragment();c=c||m(a);var d=c.frag.cloneNode(),e=0,f=l(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function p(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return r.shivMethods?n(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+l().join().replace(/\w+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(r,b.frag)}function q(a){a||(a=b);var c=m(a);return r.shivCSS&&!f&&!c.hasCSS&&(c.hasCSS=!!k(a,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")),j||p(a,c),a}var c=a.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,e=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,f,g="_html5shiv",h=0,i={},j;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",f="hidden"in a,j=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){f=!0,j=!0}})();var r={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,supportsUnknownElements:j,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:q,createElement:n,createDocumentFragment:o};a.html5=r,q(b)}(this,b),e._version=d,e._prefixes=m,e._domPrefixes=p,e._cssomPrefixes=o,e.testProp=function(a){return D([a])},e.testAllProps=F,e.testStyles=w,e.prefixed=function(a,b,c){return b?F(a,b,c):F(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+t.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};
var pre = document.getElementById("preloader")
pre = angular.element(pre)
var x = angular.module("ceawebsite",["ngRoute","ngSanitize"])
var email
// var gif = document.getElementById("loadergif")
// gif = angular.element(gif)
x.config(function($routeProvider,$locationProvider){

    $routeProvider.when("/",{
        templateUrl:"starting.html",
        controller:"starting"
    }).when("/event",{
        templateUrl:"events.html",
        controller:"events"
    }).when("/home",{
        templateUrl:"home.html",
        controller:"home"
    }).when("/reg",{
        templateUrl:"registration.html",
        controller:"registration"
    }).when("/projects",{
        templateUrl:"projects.html",
        controller:"projects"
    }).when("/accommodation",{
        templateUrl:"accommodation.html",
        controller:"accom"
    }).when("/confirmation",{
        templateUrl:"testing.html",
        controller:"confirm"
    }).when("/contactus",{
        templateUrl:"contactus.html",
        controller:"contactus"
    }).when("/login",{
        templateUrl:"login.html",
        controller:"logincontroller"
    }).when("/profile",{
        templateUrl:"profile.html",
        controller:"profile"
    }).when("/loginverify",{
        templateUrl:"loading.html",
        controller:"loginverify"
    }).when("/loading",{
        templateUrl:"loading1.html",
        controller:"loader"
    }).when("/spons",{
        templateUrl:"comingsoon.html",
        controller:"comingsoon"
    }).when("/workshops",{
        templateUrl:"workshops.html",
        controller:"comingsoon"
    }).when("/contact",{
        templateUrl:"contact.html",
        controller:"contact"
    }).when("/research",{
        templateUrl:"research.html",
        controller:"comingsoon"
    }).otherwise({
        redirectTo:'/home'
    })
    $locationProvider.html5Mode({enabled:true,requireBase:true})

})
x.run(function($rootScope, $templateCache) {
    $rootScope.$on('$viewContentLoaded', function() {
       $templateCache.removeAll();
    });
 });
//Registration


var email;
x.controller("comingsoon",function(){

})
x.controller("home",function($scope){

// console.log($scope.loggedin)


})

x.controller("contactus",function($scope){



})

x.controller("accom",function($scope){
    console.log("accom")

    $scope.navigatetotab=function(b){
        var o = document.getElementById(b)
        o= angular.element(o)
        console.log(o)
        if(o.hasClass("active")){
            console.log(o)
        }else{
            var other = document.querySelectorAll(".active")
            console.log(other)
            other = angular.element(other)
            console.log(other)
            other.removeClass("active")
            o.addClass("active")

        }
    }
})
x.controller("contactus",function($scope){

    $scope.contactarray = [{
        "pos":"Secretary",
        "name":"Shandilia",
        "contact":"8056157508",
        "email":"saishandilia@gmail.com"
    },
    {
        "pos":"Secretary",
        "name":"Chethana",
        "contact":"8790262727",
        "email":"chetanakumar7@gmail.com"
    },
    {
        "pos":"PG Secretary",
        "name":"Vaishnav Kumar",
        "contact":"9585347553",
        "email":"svaishnavkumar@gmail.com"
    },
    {
        "pos":"Media & Student Relations",
        "name":"S Sai Bhargav",
        "contact":"8096159615",
        "email":"ceaoutreach@gmail.com"
    },
    {
        "pos":"Media & Student Relations",
        "name":"Sreedevi N",
        "contact":"9500188432",
        "email":"ceaoutreach@gmail.com"
    },
    {
        "pos":"Events",
        "name":"Kranthi Kumar",
        "contact":"9500183272",
        "email":"kranthipanduru333@gmail.com"
    },
    {
        "pos":"Events",
        "name":"Hari Krishna",
        "contact":"8680902320",
        "email":"harikrishna.thummalapelly@gmail.com"
    },
    {
        "pos":"Design & Creatives",
        "name":"Regulavalasa Prashanth",
        "contact":"9500181654",
        "email":"prasha1436@gmail.com"
    },
    {
        "pos":"Design & Creatives",
        "name":"Praveen Paramata",
        "contact":"8608231113",
        "email":"praveen.p9920@gmail.com"
    },
    {
        "pos":"Design & Creatives",
        "name":"Vishwa Vignan",
        "contact":"9494156807",
        "email":"phanivenkule@gmail.com"
    },
    {
        "pos":"Finance",
        "name":"Jawahar Rajasekar",
        "contact":"9976232767",
        "email":"jawaharrajasekar002@gmail.com"
    },
    {
        "pos":"Finance",
        "name":"Vinayathi",
        "contact":"9500182979",
        "email":"vinayathiyerranagu318@gmail.com"
    },
    {
        "pos":"Finance",
        "name":"Srikanth Malyala",
        "contact":"9092929824",
        "email":"malyala2srikanth@gmail.com"
    },
    {
        "pos":"FR",
        "name":"Kandukuri Rohit",
        "contact":"9500191097",
        "email":"samuelrohit95@gmail.com"
    },
    {
        "pos":"FR",
        "name":"B.Sadguna Pavan Kumar ",
        "contact":"7010262864",
        "email":"sadgunapavan@gmail.com"
    },
    {
        "pos":"Nirmaan",
        "name":"K.Gireesh",
        "contact":"8639185163",
        "email":"gireeshsai000@gmail.com"
    },
    {
        "pos":"Nirmaan",
        "name":"U.S.K.Vaibhav",
        "contact":"7013303862",
        "email":"usk.vaibhav@gmail.com "
    },
    {
        "pos":"Projects",
        "name":"Anusha",
        "contact":"8428317161",
        "email":"vusirikalaanusha@gmail.com"
    },
    {
        "pos":"QMS",
        "name":"Sibbala Bhavana",
        "contact":"9500193321",
        "email":"princesschitti2012@gmail.com"
    },
    {
        "pos":"Sponsorship & PR",
        "name":"Srilok Sagar",
        "contact":"9177997961",
        "email":"srilok.sagar.3@gmail.com"
    },
    {
        "pos":"Sponsorship & PR",
        "name":"B.Yukti",
        "contact":"7087146594",
        "email":"bishambu20@gmail.com"
    },
    {
        "pos":"Webops",
        "name":"Chandrashekhar",
        "contact":"9057995595",
        "email":"csmathuria03@gmail.com"
    }
    
    
]

})

x.controller("starting",function($scope){
console.log("inside")


// en=angular.element(en)
        

})

x.controller("confirm",function($scope,$http){
    // var jsondata = $location.search.jsondata;
    // $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
    // $http.defaults.useXDomain = true
    // // Delete the Requested With Header
    // delete $http.defaults.headers.common['X-Requested-With'];

    $http({
        method:'post',
        url:'http://ceaiitm.org/2019/ceawebsite/testing.php',
        data:{
            name:'vamsi',
            pass:'vammuvamsi64'
        },
        // headers:{"Access-Control-Allow-Headers":"Content-Type,Access-Control-Allow-Origin","Access-Control-Allow-Origin":true,"Content-Type":"application/x-www-form-urlencoded"}
        
       
    }).then(function(r){
        console.log(r)
    })
})

x.controller("projects",function($scope){
    console.log("projects")
    console.log(document.querySelectorAll('.slide'))

})
x.controller("navbar",function($scope,$http){
    console.log("navbar")
    $scope.loggedin=localStorage.getItem("loggedin")
    console.log($scope.loggedin)
    if($scope.loggedin=="true"){
        $scope.gotoname="PROFILE"
        $scope.out="Logout"
        var l = document.getElementById("log")
        l = angular.element(l)
        l.css({
            "display":'block'
        })
        console.log($scope.loggedin)

    }else{
        $scope.gotoname="LOGIN"
        $scope.out=null
        var l = document.getElementById("log")
        l = angular.element(l)
        l.css({
            "display":'none'
        })

    }
    console.log($scope.gotoname)
    $scope.goto=function(y){
        window.location.pathname="/2019/ceawebsite/"+y.toLowerCase()
    }
    $scope.logout=function(){
      
        if($scope.out=="Logout"){
            $http({
                method:'post',
                url:'logout.php',
                headers:{'Content-Type':'application/x-www-form-urlencoded'}
            }).then(function(r){
                
                console.log(r.data)
                if(r.data.status==1){
                    $scope.loadergif=false
                    alert("You are successfully logged out")
                    window.location.pathname="/2019/ceawebsite/login"
                }else{
                    alert("There is some error,Please try again after sometime")
                    window.location.pathname="/2019/ceawebsite/login"
                }
            })
        }
    }
    // console.log(document.querySelectorAll('.slide'))

})

x.controller("registration",function($scope,$http){
    pre.modal("hide")
    $scope.electronicmail=/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
    $scope.namepattern=/^[a-zA-Z ]{1,}$/;
    $scope.mobilepattern = /^[0-9]{10,10}$/;
    $scope.passwordpattern=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,}$/;
 
    $scope.ve=function(){
        var elem = document.getElementsByClassName("sameemail")
        elem = angular.element(elem)
        if(elem.hasClass("fs-show")){
            elem.removeClass("fs-show")
        }
        email = $scope.email
        var currq = document.getElementsByClassName("fs-current")
        currq = angular.element(currq)
        console.log("validating email")
        if($scope.email == undefined){
            $scope.email=""
            console.log("inn")
        }
        if($scope.email.match($scope.electronicmail)){
            $scope.emailisvalid=true
            $scope.err = ""
            if(!currq.hasClass("valid")){
                currq.addClass("valid")
            }
            if(currq.hasClass("invalid")){
                currq.removeClass("invalid")
            }
            

        }else{
            $scope.emailisvalid=false
            $scope.err="Please enter a valid email"
            if(currq.hasClass("valid")){
                currq.removeClass("valid")
            }
            if(!currq.hasClass("invalid")){
                currq.addClass("invalid")
            }
                        
        }
    }

    $scope.vn=function(){
        var currq = document.getElementsByClassName("fs-current")

        currq = angular.element(currq)
        console.log("validating name")
            if($scope.name == undefined){
                $scope.name = ""
            }
            if($scope.name.match($scope.namepattern)){
                $scope.err = ""
                $scope.nameisvalid= true
                currq.addClass("valid")
                if(!currq.hasClass("valid")){
                    currq.addClass("valid")
                }
                if(currq.hasClass("invalid")){
                    currq.removeClass("invalid")
                }
                
    
            }else{
                $scope.nameisvalid= false
                console.log($scope.nameisvalid)
                $scope.err="Please enter a valid name"
                if(currq.hasClass("valid")){
                    currq.removeClass("valid")
                }
                if(!currq.hasClass("invalid")){
                    currq.addClass("invalid")
                }
            }

    }

    $scope.vc=function(){
        var currq = document.getElementsByClassName("fs-current")
        currq = angular.element(currq)

        if($scope.clgname.match($scope.namepattern)){
            $scope.collegenameisvalid= true
            $scope.err = ""
            if(!currq.hasClass("valid")){
                currq.addClass("valid")
            }
            if(currq.hasClass("invalid")){
                currq.removeClass("invalid")
            }
            
        }else{
            $scope.err="Please enter a valid name"
            $scope.collegenameisvalid= false
            if(currq.hasClass("valid")){
                currq.removeClass("valid")
            }
            if(!currq.hasClass("invalid")){
                currq.addClass("invalid")
            }
        }
}

    $scope.vg=function(g){
        var currq = document.getElementsByClassName("fs-current")
        currq = angular.element(currq)
        
        if(g.length==0){
            $scope.genderisvalid=false
            $scope.err="Please select one"
            if(currq.hasClass("valid")){
                currq.removeClass("valid")
            }
            if(!currq.hasClass("invalid")){
                currq.addClass("invalid")
            }
            
        }else if(g=="M" || g=="F" || g=="O"){
            $scope.genderisvalid=true
            $scope.err = ""
            $scope.gender=g
            if(!currq.hasClass("valid")){
                currq.addClass("valid")
            }
            if(currq.hasClass("invalid")){
                currq.removeClass("invalid")
            }
            
        }

    }
    
    $scope.vm=function(){
        var currq = document.getElementsByClassName("fs-current")
        currq = angular.element(currq)

        if($scope.phone.match($scope.mobilepattern)){
            $scope.mobileisvalid=true
            $scope.err = ""
            if(!currq.hasClass("valid")){
                currq.addClass("valid")
            }
            if(currq.hasClass("invalid")){
                currq.removeClass("invalid")
            }
            
        }else{
            $scope.mobileisvalid=false
            $scope.err="Please enter a valid mobile number"
            if(currq.hasClass("valid")){
                currq.removeClass("valid")
            }
            if(!currq.hasClass("invalid")){
                currq.addClass("invalid")
            }
        }
    }

    $scope.vp=function(){
        var currq = document.getElementsByClassName("fs-current")
        currq = angular.element(currq)

            if($scope.regpass.match($scope.passwordpattern)){
                $scope.passwordisvalid = true
                $scope.err = ""
                if(!currq.hasClass("valid")){
                    currq.addClass("valid")
                }
                if(currq.hasClass("invalid")){
                    currq.removeClass("invalid")
                }
                
            }else{
                $scope.passwordisvalid = false
                $scope.err="Please enter a valid password that contains atleast one Capital,one small,one number and one special character"
                if(currq.hasClass("valid")){
                    currq.removeClass("valid")
                }
                if(!currq.hasClass("invalid")){
                    currq.addClass("invalid")
                }
            }
    }


    $scope.vpp=function(){
        var currq = document.getElementsByClassName("fs-current")
        currq = angular.element(currq)

        if($scope.reregpass == $scope.regpass){
            $scope.err = ""
            $scope.repassisvalid = true
            if(!currq.hasClass("valid")){
                currq.addClass("valid")
            }
            if(currq.hasClass("invalid")){
                currq.removeClass("invalid")
            }
            
        }else{
            $scope.repassisvalid=false
            $scope.err="passwords donot match"
                
            if(currq.hasClass("valid")){
                currq.removeClass("valid")
            }
            if(!currq.hasClass("invalid")){
                currq.addClass("invalid")
            }

        }
    }



    $scope.register=function(){
        $scope.loading = true
        if($scope.emailisvalid && $scope.nameisvalid && $scope.collegenameisvalid && $scope.mobileisvalid && $scope.repassisvalid && $scope.genderisvalid){
            
            $http({
                method:"post",
                url:"reg.php",
                data:{
                    name:$scope.name,
                    clgname:$scope.clgname,
                    password:$scope.regpass,
                    gender:$scope.gender,
                    phone:$scope.phone,
                    email:$scope.email
                },
                headers:{"Content-Type":"application/x-www-form-urlencoded"}
            }).then(function(r){
            $scope.regdata = r.data
                if(r.data.status==1){
                    window.location.pathname="/2019/ceawebsite/login"
                }
            }).finally(function(){
                $scope.loading = false;
            })
        
        }else{
            $scope.loading=false
            $scope.formerr = "please check your details once"
        
        }
        


    }
    
    })

    x.controller("loginverify",function($scope,$http,$location){

        $scope.namepattern=/^[a-zA-Z0-9]{1,}$/;
        var electronicmail=/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/
        var em = $location.search().emai;
        var l = "kjzdnjknbsjkjsjhbd28938JHBFHJBH"
        // console.log(l.match($scope.namepattern))
        var cc = $location.search().confcode;
        if(em!=undefined && cc!=undefined){
                if(em.match(electronicmail) && cc.match($scope.namepattern)){
                        
                    $http({
                        method:'verify',
                        url:'login.php',
                        data:{
                            email:em,
                            confcode:cc
                        },
                        headers:{"Content-Type":'application/x-www-form-urlencoded'}
                    }).then(function(r){
                        $scope.status =r.data.statuss   
                        if(r.data.statuss==1){
                            alert('Your account is verified')    
                            window.location.href="http://ceaiitm.org/2019/ceawebsite/login/"
                            
                            }else{
                                alert('there is something wrong')
                                window.location.href="http://ceaiitm.org/2019/ceawebsite/login/"
                                
                            }
                            
                    })

                }                

        }


    })

    x.controller("logincontroller",function($scope,$http,$location){
       console.log("in")
        $scope.namepattern=/^[a-zA-Z0-9]{1,}$/;
        var electronicmail=/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/
        
        $scope.fev= function(){
            console.log($scope.forgotemail)
            if($scope.forgotemail.match(electronicmail)){
                $scope.fevisvalid=true
                $scope.error=""
            }else{
                $scope.fevisvalid = false
                $scope.error="Invalid email"
            }

        }

        $scope.forgotpass=function(){

            console.log($scope.fevisvalid)
            if($scope.fevisvalid){
                $http({
                    method:'post',
                    url:'forgotpass.php',
                    data:{
                        email:$scope.forgotemail
                    },
                    headers:{'Content-Type':"application/x-www-form-urlencoded"}
                }).then(function(r){
                    
                    $scope.forgotstatus = r.data.status
                    if(r.data.status==1){
                        var fp = document.getElementById("changepasswordModal")
                        fp = angular.element(fp)
                        fp.modal("hide")
                        alert("An email containing a new password has been sent.")
                    }else if(r.data.status==-1){
                        $scope.error = "This email is not registered"
                    }else{
                        var fp = document.getElementById("changepasswordModal")
                        fp = angular.element(fp)
                        fp.modal("hide")
                        alert("There is some error.Please try again after sometime")
                    }

                })
            }else{
                $scope.error="Invalid email"
            }


        }

        $scope.ve=function(){
            // console.log("validating email")
            if($scope.logmail != undefined){
                if($scope.logmail.match(electronicmail)){
                    $scope.emerr = ""
                    $scope.emailisvalid=true
                 }else{
                     $scope.emerr="Invalid email"
                     $scope.emailisvalid = false
                 
                    }
            } 
        }

        $scope.vp=function(){
            
            if($scope.password.length==0){
                $scope.passerr="Password is required"
            }else{
                $scope.passerr = ""
            }
        }

        
        $scope.login=function(){

            if($scope.emailisvalid && $scope.password.length!=0){
              
                $scope.loading = "loading.."
                // pre.modal("show")
                $http({
                    method:"post",
                    url:"login.php",
                    data:{
                        logmail:$scope.logmail,
                        password:$scope.password
                    },
                    headers:{"Content-Type":'application/x-www-form-urlencoded'}
                }).then(function(r){
                    
                    $scope.logindata = r.data
                    console.log(r.data)
                    if(r.data.status==1){
                        localStorage.setItem("loggedin",true)
                        window.location.pathname="/2019/ceawebsite/profile"

                        console.log("logged in")
                    }else if(r.data.status==-1){
                        $scope.logerr="Invalid password"
                    }else{
                        $scope.logerr="This email is not registered"
                    }
                }).finally(function(r){
                    console.log(r)
                    $scope.loading = ""
                })


            }else{
                $scope.logerr = "Please fill the info correctly"
            }

            
    
        }
    
    
    
    })
x.directive("quesPrev",function(){
    return{
        link:function(scope,element,attr){
                element.on("click",function(){
                    
                    var el = document.getElementsByClassName("fs-current")
                    el = angular.element(el)
                    if(el.hasClass("valid")){
                        var ol = document.getElementsByClassName("fs-fields")
                        ol = angular.element(ol)
                        var ele = document.getElementsByClassName("fs-message-error")
                        ele = angular.element(ele)
                        if(ele.hasClass("fs-show")){
                            ele.removeClass("fs-show")
                        }
                        var children = el[0].children
                        var label = angular.element(children[0])
                        var input = angular.element(children[1])
                        var cur_ques = el[0].classList[0]
                        var quesnumb = parseInt(cur_ques[1],10)
                        if(cur_ques=="q1"){
                            console.log("its first question")
                        }else{
                            quesnumb = quesnumb-1
                            var prevquesclass = "q" + quesnumb.toString()
                            var prevques = document.getElementsByClassName(prevquesclass)
                            
                            prevques = angular.element(prevques)
                            // console.log(pre)
                            ol.addClass("fs-display-prev")
                            el.removeClass("fs-current")
                            el.addClass("fs-hide")  
                            prevques.addClass("fs-show")
                            prevques.addClass("fs-current")
                            setTimeout(function(){
                                ol.removeClass("fs-display-prev")
                                el.removeClass("fs-hide")
                                prevques.removeClass("fs-show")
                               
                            },700)
                              
                                                
                            console.log(el[0].classList)
    
                        }
                    }else{
                        var ele = document.getElementsByClassName("fs-message-error")
                        ele = angular.element(ele)
                        if(!ele.hasClass("fs-show")){
                            ele.addClass("fs-show")
                        }
                    }
                    
                })
        }
    }
    
})

x.directive("quesNext",function($http){
    return{

        link:function($scope,element,attr){
                element.on("click",function(){
                    var el = document.getElementsByClassName("fs-current")
                    el = angular.element(el)
                    // console.log($scope.name)
                    var ele = document.getElementsByClassName("commonerr")
                    ele = angular.element(ele)
                    var cur_ques = el[0].classList[0]
                    var elem = document.getElementsByClassName("sameemail")
                    elem = angular.element(elem) 
                        var ol = document.getElementsByClassName("fs-fields")
                        ol = angular.element(ol)
                     
                        var quesnumb = parseInt(cur_ques[1],10)
                          
                    //for email check
                    if(cur_ques=="q2" && el.hasClass("valid")){
                        if(ele.hasClass("fs-show")){
                            ele.removeClass("fs-show")

                        }
                        $http({
                            method:'post',
                            url:"reg1.php",
                            data:{
                                em:email
                            },
                            headers:{"Content-Type":"application/x-www-form-urlencoded"}
                        }).then(function(r){
                            if(r.data.status==1){
                               
                                quesnumb = quesnumb+1
                                var nextquesclass = "q" + quesnumb.toString()
                                var nextques = document.getElementsByClassName(nextquesclass)
                                nextques = angular.element(nextques)
                                ol.addClass("fs-display-next")    
                                    el.removeClass("fs-current")
                                    el.addClass("fs-hide")  
                                    nextques.addClass("fs-current")
                                    nextques.addClass("fs-show")
                                                         
                                    setTimeout(function(){
                                        ol.removeClass("fs-display-next")
                                        el.removeClass("fs-hide")
                                        nextques.removeClass("fs-show")     
                                        
                                    },700)
     

                            }else{
                               
                        if(!elem.hasClass("fs-show")){
                            elem.addClass("fs-show")
                        }
                            }
                        })
                    
                    } 
                    else if(el.hasClass("valid")){

                        if(ele.hasClass("fs-show")){
                            ele.removeClass("fs-show")
                        }
                        if(cur_ques=="q7"){
                            ol.addClass("fs-display-next")
                            el.removeClass("fs-current")
                            el.addClass("fs-hide") 
                            var form = document.getElementById("myform")
                            form = angular.element(form)
                            setTimeout(function(){
                            ol.removeClass("fs-display-next")
                            el.removeClass("fs-hide")
                            var rows = document.getElementsByClassName("row")
                            rows = angular.element(rows)
                            rows.remove() 
                            form.removeClass("fs-form-full")
                            form.addClass("fs-form-overview")
                            form.addClass("fs-show")
                            var body = document.body
                            body= angular.element(body)
                            body.addClass("overview")
                            },700)
                            
                        }else{
                            quesnumb = quesnumb+1
                            var nextquesclass = "q" + quesnumb.toString()
                            var nextques = document.getElementsByClassName(nextquesclass)
                            nextques = angular.element(nextques)
                            ol.addClass("fs-display-next")    
                                el.removeClass("fs-current")
                                el.addClass("fs-hide")  
                                nextques.addClass("fs-current")
                                nextques.addClass("fs-show")
                                                     
                                setTimeout(function(){
                                    ol.removeClass("fs-display-next")
                                    el.removeClass("fs-hide")
                                    nextques.removeClass("fs-show")     
                                    
                                },700)
                                
    
                        }
                    }else{
                        var elem = document.getElementsByClassName("fs-message-error")
                        elem = angular.element(ele)
                        if(!elem.hasClass("fs-show")){
                            elem.addClass("fs-show")
                        }
                    }
                   
                })
        }
    }
    
})

     //End of Reg

//login

x.directive("logIn",function(){
    return{
        link:function(scope,el,attrs){
            var current = null;
    document.querySelector('#email').addEventListener('mouseover', function(e) {
        console.log("hover")
      if (current) current.pause();
      current = anime({
        targets: 'path',
        strokeDashoffset: {
          value: 0,
          duration: 700,
          easing: 'easeOutQuart'
        },
        strokeDasharray: {
          value: '240 1386',
          duration: 700,
          easing: 'easeOutQuart'
        }
      });
    });
    document.querySelector('#password').addEventListener('mouseover', function(e) {
      if (current) current.pause();
      current = anime({
        targets: 'path',
        strokeDashoffset: {
          value: -336,
          duration: 700,
          easing: 'easeOutQuart'
        },
        strokeDasharray: {
          value: '240 1386',
          duration: 700,
          easing: 'easeOutQuart'
        }
      });
    });
    document.querySelector('#submit').addEventListener('mouseover', function(e) {
      if (current) current.pause();
      current = anime({
        targets: 'path',
        strokeDashoffset: {
          value: -730,
          duration: 700,
          easing: 'easeOutQuart'
        },
        strokeDasharray: {
          value: '530 1386',
          duration: 700,
          easing: 'easeOutQuart'
        }
      });
    });
        }
    }
})


//end of login

     //Events
     var books 
x.controller("events",function($scope,$http){
    console.log("in controller")
    
    
    $scope.sometext = "<p>hiii</p>"
     $scope.el = angular.element('<p>hiii</p>')
     $scope.el = $scope.el[0].innerHTML
     console.log($scope.el)
    // var gif = document.getElementById("loadergif")
    // gif = angular.element(gif)
    // gif.css({
    //     "display":"block"
    // })
    $http({
        method:'get',
        url:'events.php'
    }).then(function(r){
        var removed = 0
        var te=10000
    // while(te>=0){
    //     console.log("te")
    //     te=te-1
    // }
    // var gif = document.getElementById("loadergif")
    // gif = angular.element(gif)
    // gif.css({
    //     "display":"none"
    // })
    
        for(var i=0;i<r.data.length;i++){
            if(r.data[i].event=="STRUCTURAL DESIGN" || r.data[i].event=="AIR QUALITY CONTROL"){
                    console.log(r.data[i].event)
                r.data.splice(i,1)
                    removed = removed+1
                    
                console.log(removed)
                }
                if(r.data[i].event=="STRUCTURAL DESIGN"){
                    console.log(r.data[i].event)
                r.data.splice(i,1)
                    removed = removed+1
                    
                console.log(removed)
                }
                if(r.data[i].event=="Online Quiz"){
                    console.log(r.data[i].event)
                r.data.splice(i,1)
                    removed = removed+1
                    
                console.log(removed)
                }
                if(r.data[i].event=="Workshop"){
                    console.log(r.data[i].event)
                r.data.splice(i,1)
                    removed = removed+1
                    
                console.log(removed)
                }
        }
        $scope.events = r.data
        console.log(r.data)
        console.log(r.data[1].contact[0])
    })
    

})
function start(){
    books = document.getElementsByClassName("bk-book book-1 bk-bookdefault")
    books = angular.element(books)                        
    console.log(books.length)

}
setTimeout(start,1000)

x.directive("bookFlip",function(){
  return{
      link:function(scope,element,attrs){
        
        element.on("click",function(){
            var bookview = element.parent()
                
            bookview = angular.element(bookview[0])
            var bookviewbutton = angular.element(bookview[0])
            
            bookviewbutton = angular.element(bookviewbutton.children()[1])
            console.log(bookviewbutton)
            var li = bookview.parent()
            li = angular.element(li[0])
           var book = li.children()[0]
            book = angular.element(book)        
            bookviewbutton.removeClass( 'bk-active' );
                if(book.data('flip')){
                    book.data( { opened : false, flip : false } ).removeClass( 'bk-viewback' ).addClass( 'bk-bookdefault' );
                }else{
                    book.data( { opened : false, flip : true } ).removeClass( 'bk-viewinside bk-bookdefault' ).addClass( 'bk-viewback' );
                }

                
                // console.log(element.parent())
        })

      }
  }  
})

x.directive("bookOpen",function(){
    return{
        link:function(scope,element,attrs){
            let current,page,content,navPrev,navNext
            let insidebook = false
            

            element.on('click',function(){
                
            var bookview = element.parent()
            bookview = angular.element(bookview[0])
            var bookviewbutton = angular.element(bookview[0])
            bookviewbutton = angular.element(bookviewbutton.children()[1])
            // console.log(bookviewbutton)
            var li = bookview.parent()
            li = angular.element(li[0])
            // console.log(li)
            var book = li.children()[0]
            book = angular.element(book)
            var par = book.parent()
            // console.log(par)
            var parpar = par.parent()
            // console.log(parpar[0])
            // console.log(book)
            
            var other = books.not(book)
            page = book.children()[1]
            page = angular.element(page)
            // console.log(page)
             content = page.children()
            content = angular.element(content)
            // console.log(other.length)
            other.data( 'opened', false ).removeClass( 'bk-viewinside' ).parent().css( 'z-index', 0 ).find( 'button.bk-bookview' ).removeClass( 'bk-active' );
            // console.log(other.length)    
            if( !other.hasClass( 'bk-viewback' ) ) {
					other.addClass( 'bk-bookdefault' );
				}

				if( book.data( 'opened' ) ) {
                    insidebook=false
					element.removeClass( 'bk-active' );
					book.data( { opened : false, flip : false } ).removeClass( 'bk-viewinside' ).addClass( 'bk-bookdefault' );
				}
				else {
                    insidebook = true
                    
					element.addClass( 'bk-active' );
					book.data( { opened : true, flip : false } ).removeClass( 'bk-viewback bk-bookdefault' ).addClass( 'bk-viewinside' );
					par.css( 'z-index', 19 );
					current = 0;
					content.removeClass( 'bk-content-current' ).eq( current ).addClass( 'bk-content-current' );
                    
                }
                if(insidebook && !navPrev){
                    navPrev = angular.element( '<span class="bk-page-prev">&lt;</span>' )
                navNext = angular.element( '<span class="bk-page-next">&gt;</span>' )
                    console.log(navPrev,page)
                page.append( angular.element( '<nav></nav>' ).append( navPrev, navNext ) );
                    ini()
                   
                }


            })
            function ini(){

            
                console.log("dks")
                navPrev.on( 'click', function() {
                    console.log("inside")
                    if( current > 0 ) {
                        --current;
                        content.removeClass( 'bk-content-current' ).eq( current ).addClass( 'bk-content-current' );
                    }
                    return false;
                } );
    
                navNext.on( 'click', function() {
                    if( current < content.length - 1 ) {
                        ++current;
                        content.removeClass( 'bk-content-current' ).eq( current ).addClass( 'bk-content-current' );
                    }
                    return false;
                } );    
            }
            
        }
    }
})

//End of Event


//profile
x.controller("loginverifycontroller",function($scope,$http,$routeParams){

    console.log($routeParams.emai,$routeParams.confcode)

})

x.controller("profile",function($scope,$http){
    $scope.mem2=""
    $scope.mem3=""
    $scope.mem4=""
    $scope.namepattern=/^[a-zA-Z ]{3,}$/;
    $scope.mobilepattern = /^[0-9]{10,10}$/;
    $scope.addpatt=/^[a-zA-Z ,-/]{2,}$/
    $scope.passwordpattern=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,}$/;
    var idpatt = /CEA19N\d{1,}$/
    // console.log(localStorage.getItem())
    $scope.eventname="Select an Event"
    if(localStorage.getItem("loggedin")){
        $http({
            method:"post",
            url:"getuserdetails.php",
            headers:{'Content-Type':"application/x-form-www-urlencoded"}
        }).then(function(r){
            console.log(r)
                $scope.name = r.data.name
                $scope.idd=r.data.id.toString()
                $scope.ceaid = "CEA19N" + r.data.id.toString()
                $scope.phone = r.data.phone
                $scope.gender = r.data.gender
                $scope.email = r.data.email
                $scope.clgname = r.data.clgname
                $scope.payment = r.data.payment
                $scope.regworkshops=r.data.workshops.split(",")
                $scope.regworkshops.splice(0,1)
                $scope.structural = r.data.structural
                $scope.air = r.data.air
                $scope.festfee = r.data.festfee
                $scope.accomodation = r.data.accomodation
                $scope.days = r.data.days
                $scope.verified = r.data.verified1
                $scope.qrcode = "qrs/qr_"+$scope.idd+".png"
                
                if($scope.gender="M"){
                    $scope.imgsrc = "images/profilePics/profilemale.jpg"
                }else if($scope.gender="F"){
                    $scope.imgsrc="images/profilePics/femaleprofile.jpg"
                }
                $scope.regisevents = r.data.regisevents.split(",")
                $scope.regisevents.splice(0,1)
            // console.log($scope.regisevents)
            // console.log($scope.regworkshops)
            
            })

            $http({
                method:'verify',
                url:'referral.php',
                headers:{'Content-Type':"application/x-form-www-urlencoded"}
            }).then(function(r){
                if(r.data.status==1){
                    var ref = document.getElementById("ref")
                    ref = angular.element(ref)
                    ref.modal('show')
                }else{
                    console.log(1)
                }
            })
            pre.modal("hide")
    }else{
        console.log("not logged in")
        window.location.pathname="/2019/ceawebsite/login"
    }

    $scope.g = function(){
        if($scope.gro!="Campus Ambassador"){
            $scope.refer = $scope.gro
        }else{
            $scope.refer=""
            $scope.groid = ""
        }
    }
    
    $scope.gid = function(){
        $scope.refer = $scope.groid
    }
    $scope.submitref=function(){
        $http({
            method:'post',
            url:'referral.php',
            data:{
                refer:$scope.refer
            },
            headers:{'Content_Type':'application/x-form-www-urlencoded'}
        }).then(function(r){
            if(r.data.status==1){
                $scope.nouser=""
                var ref = document.getElementById("ref")
                ref = angular.element(ref)
                ref.modal('hide')
                alert("Thankyou for your feedback")
            }else if(r.data.status==-1){
                $scope.nouser=""
                alert("Please try again after sometime")
            }else if(r.data.status==0){
                $scope.nouser = "This CEA ID is not found in database"
            }
        })
    }
   $scope.testchangeevent=function(){
       console.log($scope.testevent)
     
         
   }
   $scope.submitevent=function(){
    var m = document.getElementById("registereventsModal")
    m = angular.element(m)
     m.modal('hide')
     var m1 = document.getElementById("multieventregisterModal")
     m1 = angular.element(m1)
     m1.modal('show')
   }
   $scope.submitworkshop=function(){
    var m = document.getElementById("workshopregisterModal")
    m = angular.element(m)
     m.modal('hide')
     var m1 = document.getElementById("multiworkshopregisterModal")
     m1 = angular.element(m1)
     m1.modal('show')
   }
    

    
    $scope.mem2change= function(){
        // console.log($scope.mem2isvalid)
        if($scope.mem2.match(idpatt)){
            $scope.iderr = ""
            $scope.mem2isvalid = true
        }else{
            $scope.iderr = "One of the IDs is invalid"
            $scope.mem2isvalid = false
        }
    }

    $scope.mem3change= function(){
        // console.log($scope.mem3isvalid)
        
        if($scope.mem3.match(idpatt)){
            $scope.iderr = ""
            $scope.mem3isvalid = true
        }else{
            $scope.iderr = "One of the IDs is invalid"
            
            $scope.mem3isvalid = false
        }
    }

    $scope.mem4change= function(){
        // console.log($scope.mem4isvalid)
        if($scope.mem4.match(idpatt)){
            $scope.iderr = ""
            $scope.mem4isvalid = true
        }else{
            $scope.iderr = "One of the IDs is invalid"
            $scope.mem4isvalid = false
        }
    }

    $scope.mem5change= function(){
        // console.log($scope.mem5isvalid)
        if($scope.mem5.match(idpatt)){
            $scope.iderr = ""
            $scope.mem5isvalid = true
        }else{
            $scope.iderr = "One of the IDs is invalid"
            $scope.mem5isvalid = false
        }
    }

    $scope.registerforevents=function(){
        var bo = document.getElementsByTagName("body")
        bo = angular.element(bo)
        bo.loadingModal({
            text:'Loading....'
        })
        bo.loadingModal('animation','foldingCube').loadingModal('backgroundColor', 'gray')
        var mod = document.getElementById("multieventregisterModal")
        mod = angular.element(mod)
        if($scope.eventname!="Essay" && $scope.eventname!="Potential Professor"){

            if($scope.eventname!="Aquanomics"){

                if($scope.eventname!="Concrete Challenge" && $scope.eventname!="Geo Genius" && $scope.eventname!="Master Builder" && $scope.eventname!="Encode Steel"){
                    console.log($scope.mem2isvalid,$scope.mem3isvalid,$scope.mem4isvalid,$scope.mem5isvalid)
                    if($scope.mem2isvalid && $scope.mem3isvalid && $scope.mem4isvalid && $scope.mem5isvalid){
                        $http({
                            method:'post',
                            url:'registerforevent1.php',
                            data:{
                                mem1:$scope.ceaid,
                                mem2:$scope.mem2,
                                mem3:$scope.mem3,
                                mem4:$scope.mem4,
                                mem5:$scope.mem5,
                                event:$scope.eventname
                            },
                            headers:{'Content-Type':'application/x-form-www-urlencoded'}
                        }).then(function(r){
                            if(r.data.status==1){
                                mod.modal('hide')
                                bo.loadingModal('hide')
                                alert("successfully registered for "+$scope.eventname +" event")
                                window.location.reload()
                            }else if(r.data.status==-1){
                                
                                bo.loadingModal('hide')
                                alert("one of your teammates has been already registered")
                            }else if(r.data.status==-3){
                                bo.loadingModal('hide')
                                alert("One of your teammates ID is not found")
                            }
                            else{
                                
                                bo.loadingModal('hide')
                                alert("Please try again after some time")
                                window.location.pathname="/2019/ceawebsite/profile"
                            }
                        })
                    
                    }else{
                        
                        bo.loadingModal('hide')
                        alert("One of the IDs is invalid or empty")
                    }    
                   

                }else{
                    console.log($scope.mem2isvalid,$scope.mem3isvalid,$scope.mem4isvalid,$scope.mem5isvalid)
                    
                    if($scope.eventname=="Geo Genius"){
                        
                        if($scope.mem2isvalid){

                            if($scope.mem3.length==0 && $scope.mem4.length==0){
                                $http({
                                    method:'post',
                                    url:'registerforevent2.php',
                                    data:{
                                        mem1:$scope.ceaid,
                                        mem2:$scope.mem2,
                                        mem3:$scope.mem3,
                                        mem4:$scope.mem4,
                                        event:$scope.eventname
                                    },
                                    headers:{'Content-Type':'application/x-form-www-urlencoded'}
                                }).then(function(r){
                                    if(r.data.status==1){
                                        mod.modal('hide')
                                        bo.loadingModal('hide')
                                        alert("successfully registered for "+$scope.eventname +" event")
                                        window.location.reload()
                                    }else if(r.data.status==-1){
                                        
                                        bo.loadingModal('hide')
                                        alert("one of your teammates has been already registered")
                                    }else if(r.data.status==-3){
                                        bo.loadingModal('hide')
                                        alert("One of your teammates ID is not found")
                                    }
                                    else{
                                        
                                        bo.loadingModal('hide')
                                        alert("Please try again after some time")
                                        window.location.pathname="/2019/ceawebsite/profile"
                                    }
                                })
                            }else if($scope.mem3.length==0){
                                if($scope.mem4isvalid){
                                    $http({
                                        method:'post',
                                        url:'registerforevent3.php',
                                        data:{
                                            mem1:$scope.ceaid,
                                            mem2:$scope.mem2,
                                            mem3:$scope.mem4,
                                            event:$scope.eventname
                                        },
                                        headers:{'Content-Type':'application/x-form-www-urlencoded'}
                                    }).then(function(r){
                                        if(r.data.status==1){
                                            mod.modal('hide')
                                            bo.loadingModal('hide')
                                            alert("successfully registered for "+$scope.eventname +" event")
                                            window.location.reload()
                                        }else if(r.data.status==-1){
                                            
                                            bo.loadingModal('hide')
                                            alert("one of your teammates has been already registered")
                                        }else if(r.data.status==-3){
                                            bo.loadingModal('hide')
                                            alert("One of your teammates ID is not found")
                                        }
                                        else{
                                            
                                            bo.loadingModal('hide')
                                            alert("Please try again after some time")
                                            window.location.pathname="/2019/ceawebsite/profile"
                                        }
                                    })
                                }else{
                                    
                        bo.loadingModal('hide')
                        alert("One of the IDs is invalid or empty")
                                }
                            }else if($scope.mem4.length==0){
                                if($scope.mem3isvalid){
                                    $http({
                                        method:'post',
                                        url:'registerforevent3.php',
                                        data:{
                                            mem1:$scope.ceaid,
                                            mem2:$scope.mem2,
                                            mem3:$scope.mem3,
                                            event:$scope.eventname
                                        },
                                        headers:{'Content-Type':'application/x-form-www-urlencoded'}
                                    }).then(function(r){
                                        if(r.data.status==1){
                                            mod.modal('hide')
                                            bo.loadingModal('hide')
                                            alert("successfully registered for "+$scope.eventname +" event")
                                            window.location.reload()
                                        }else if(r.data.status==-1){
                                            
                                            bo.loadingModal('hide')
                                            alert("one of your teammates has been already registered")
                                        }else if(r.data.status==-3){
                                            bo.loadingModal('hide')
                                            alert("One of your teammates ID is not found")
                                        }
                                        else{
                                            
                                            bo.loadingModal('hide')
                                            alert("Please try again after some time")
                                            window.location.pathname="/2019/ceawebsite/profile"
                                        }
                                    })
                                }else{
                                    
                        bo.loadingModal('hide')
                        alert("One of the IDs is invalid or empty")
                                }
                            }

                        }else{
                            bo.loadingModal('hide')
                            alert("One of the IDs is invalid or empty")
                        }
                    }
                    else if($scope.mem2isvalid && $scope.mem3isvalid && $scope.mem4isvalid){
                        $http({
                            method:'post',
                            url:'registerforevent2.php',
                            data:{
                                mem1:$scope.ceaid,
                                mem2:$scope.mem2,
                                mem3:$scope.mem3,
                                mem4:$scope.mem4,
                                event:$scope.eventname
                            },
                            headers:{'Content-Type':'application/x-form-www-urlencoded'}
                        }).then(function(r){
                            if(r.data.status==1){
                                mod.modal('hide')
                                bo.loadingModal('hide')
                                alert("successfully registered for "+$scope.eventname +" event")
                                window.location.reload()
                            }else if(r.data.status==-1){
                                
                                bo.loadingModal('hide')
                                alert("one of your teammates has been already registered")
                            }else if(r.data.status==-3){
                                bo.loadingModal('hide')
                                alert("One of your teammates ID is not found")
                            }
                            else{
                                
                                bo.loadingModal('hide')
                                alert("Please try again after some time")
                                window.location.pathname="/2019/ceawebsite/profile"
                            }
                        })
                    
                    }else{
                        
                        bo.loadingModal('hide')
                        alert("One of the IDs is invalid or empty")
                    }
                    

                }

            }else{
                console.log($scope.mem2isvalid,$scope.mem3isvalid,$scope.mem4isvalid,$scope.mem5isvalid)
                    
                if($scope.mem2isvalid && $scope.mem3isvalid){
                    $http({
                        method:'post',
                        url:'registerforevent3.php',
                        data:{
                            mem1:$scope.ceaid,
                            mem2:$scope.mem2,
                            mem3:$scope.mem3,
                            event:$scope.eventname
                        },
                        headers:{'Content-Type':'application/x-form-www-urlencoded'}
                    }).then(function(r){
                        if(r.data.status==1){
                            mod.modal('hide')
                            bo.loadingModal('hide')
                            alert("successfully registered for "+$scope.eventname +" event")
                            window.location.reload()
                        }else if(r.data.status==-1){
                            
                            bo.loadingModal('hide')
                            alert("one of your teammates has been already registered")
                        }else if(r.data.status==-3){
                            bo.loadingModal('hide')
                            alert("One of your teammates ID is not found")
                        }
                        else{
                            
                            bo.loadingModal('hide')
                            alert("Please try again after some time")
                            window.location.pathname="/2019/ceawebsite/profile"
                        }
                    })
                }else{
                    
                    bo.loadingModal('hide')
                    alert("One of the IDs is invalid or empty")
                }
                

            }


        }else{
            
            $http({
                method:'post',
                url:'registerforevent4.php',
                data:{
                    mem1:$scope.ceaid,
                    event:$scope.eventname
                },
                headers:{'Content-Type':'application/x-form-www-urlencoded'}
            }).then(function(r){
                    if(r.data.status==1){
                        mod.modal('hide')
                        bo.loadingModal('hide')
                        alert("successfully registered for "+$scope.eventname +" event")
                        window.location.reload()
                    }else if(r.data.status==-1){
                        
                        bo.loadingModal('hide')
                        alert("you have been already registered")
                    }else{
                        
                        bo.loadingModal('hide')
                        alert("Please try again after some time")
                        window.location.pathname="/2019/ceawebsite/profile"
                    }
            })

        }

    
    }

    $scope.changeworkshop=function(){

       console.log($scope.workshop)

    }

    $scope.changeyear=function(){
        console.log($scope.deg)
    }

    $scope.changeyearr=function(){
        console.log(1)
    }

    

    $scope.registerforworkshop=function(){
        var bo = document.getElementsByTagName("body")
        bo = angular.element(bo)
        bo.loadingModal({
            text:'Loading....'
        })
        bo.loadingModal('animation','foldingCube').loadingModal('backgroundColor', 'gray')
        var mo = document.getElementById("multiworkshopregisterModal")
        mo = angular.element(mo)
        $http({
            method:'post',
            url:'registerforworkshop.php',
            data:{
                yr:$scope.curyear,
                stream:$scope.deg,
                workshops:$scope.regworkshops,
                curwork:$scope.workshop,
                id:$scope.idd
            },
            headers:{'Content-Type':'application/x-form-www-urlencoded'}
        }).then(function(r){
            if(r.data.status==1){
                bo.loadingModal('hide')
                mo.modal('hide')
                alert("successfully registered for "+$scope.workshop + " workshop")
            }else if(r.data.status==-1){
                bo.loadingModal('hide')
                    alert("You have been already registered")
            }else if(r.data.status==-2){
                bo.loadingModal('hide')
                    alert("Sorry seats are over...")
            }else{
                bo.loadingModal('hide')
                    alert("Please try after some time")
                    window.location.pathname="/2019/ceawebsite/profile"
            }
        })



    }
    
    $scope.citychange=function(){
        if($scope.city.match($scope.namepattern)){
            $scope.cityisvalid = true
            $scope.cityerr=""
        }else{
            $scope.cityisvalid=false
            $scope.cityerr="invalid city name"
        }
    }
    $scope.changeoptspecial=function(x){
        $scope.spe = x
        
    }
    $scope.changeoptgate=function(y){
    $scope.gate = y   
    }
    $scope.changeoptposter=function(z){
        $scope.interest = z
    }
    $scope.pinchange=function(){
        $scope.pinpattern=/^[0-9]{6,6}$/
        if($scope.pincode.match($scope.pinpattern)){
            $scope.pinisvalid = true
            $scope.pinerr = ""
        }else{
            $scope.pinisvalid=false
            $scope.pinerr = "invalid pincode"
        }
    }

    $scope.stachange=function(){
        if($scope.sta.match($scope.namepattern)){
            $scope.staisvalid = true
            $scope.staerr = ""
        }else{
            $scope.staisvalid=false
            $scope.staerr = "Invalid state name"
        }
    }
    $scope.addchange=function(){
        // console.log($scope.address.length)
        if($scope.address!=undefined){
            $scope.addisvalid = true
            $scope.adderr = ""
        }else{
            $scope.addisvalid=false
            $scope.adderr = "Invalid address"
        }
    }
    $scope.discchange=function(){
        if($scope.discip.match($scope.namepattern)){
            $scope.discipisvalid = true
            $scope.disciperr = ""
        }else{
            $scope.discipisvalid=false
            $scope.disciperr = "Invalid"
        }
    }
    $scope.univchange=function(){
        if($scope.univ.match($scope.namepattern)){
            $scope.univisvalid = true
            $scope.univerr=""
        }else{
            $scope.univisvalid=false
            $scope.univerr="Invalid University"
        }
    }
    $scope.cgchange=function(){
        $scope.cgpatt = /^[0-9 .]{1,}/
        if($scope.cgpa.match($scope.cgpatt)){
            $scope.cgisvalid = true
            $scope.cgerr = ""
        }else{
            $scope.cgisvalid=false
            $scope.cgerr="Invalid number"
        }
    }
    $scope.ugchange=function(){
        if($scope.ugdeg.match($scope.namepattern)){
            $scope.ugisvalid = true
            $scope.ugerr=""
        }else{
            $scope.ugisvalid=false
            $scope.ugerr="Invalid UG Degree"
        }
    }
    $scope.yearchange=function(){
        $scope.numpatt = /^[0-9]{4,4}$/
        if($scope.yearofgrad.match($scope.numpatt)){
            $scope.yearisvalid = true
            $scope.yearerr=""
        }else{
            $scope.yearisvalid=false
            $scope.yearerr="Invalid year"
        }
    }
    $scope.specchange=function(){
        console.log($scope.spec)
    }
    $scope.dobchange=function(){
        console.log(document.getElementById("datetime").value)
    }
    
    
    $scope.registerforresearchexpo=function(){
        var bo = document.getElementsByTagName("body")
        bo = angular.element(bo)
        bo.loadingModal({
            text:'Loading....'
        })
        bo.loadingModal('animation','foldingCube').loadingModal('backgroundColor', 'gray')
      
    
        var fil = document.getElementById("fileupl").files[0]
        console.log(fil)
        var fd = new FormData()
        // console.log($scope.idd,$scope.name,$scope.phone,$scope.email,$scope.gender,$scope.clgname,$scope.dob,$scope.city,$scope.address,$scope.pincode
        //     ,$scope.sta,$scope.ugdeg,$scope.discip,$scope.univ,$scope.cgpa,$scope.yearofgrad,$scope.gate,$scope.interest,$scope.spec)
        if($scope.ugisvalid && $scope.yearisvalid && $scope.cgisvalid && $scope.univisvalid && $scope.staisvalid && $scope.discipisvalid && $scope.addisvalid && $scope.cityisvalid && $scope.pinisvalid && document.getElementById("datetime").value!="" && $scope.gate!="" && $scope.spec!="" && $scope.interest!="" && fil!=undefined){

                fd.append("ceaid",$scope.idd) //1
                fd.append("fname",$scope.name) //2
                fd.append("phone",$scope.phone) //3
                fd.append("email",$scope.email) //4
                fd.append("gender",$scope.gender) //5
                fd.append("coll",$scope.clgname) //6
                fd.append("dob",document.getElementById("datetime").value) //7
                fd.append("city",$scope.city) //8
                fd.append("addr",$scope.address) //9
                fd.append("pinc",$scope.pincode) //10
                fd.append("sta",$scope.sta) //11
                fd.append("ug",$scope.ugdeg)   //12
                fd.append("disc",$scope.discip) //13
                fd.append("univ",$scope.univ)   //14
                fd.append("cg",$scope.cgpa) //15
                fd.append("yr",$scope.yearofgrad) //16
                fd.append("gate",$scope.gate)   //17
                fd.append("interest",$scope.interest)   //18
                fd.append("spec",$scope.spe)   //19
                fd.append("filenam",fil)   //20
                // console.log(fd)
                $http({
                    method:'post',
                    url:'registerforresearchexpo.php',
                    data:fd,
                    headers:{'Content-Type':undefined}
                }).then(function(r){
                    console.log(r)
                    if(r.data.status==1){
                        var j = document.getElementById("researchexpoModal")
                        j = angular.element(j)
                        j.modal("hide")
                        bo.loadingModal('hide')
                        alert("Registered successfully")
                        
                    }else if(r.data.status==0){
                        bo.loadingModal('hide')
                        alert("file should be in pdf format")
                    }else if(r.data.status==-1){
                        bo.loadingModal('hide')
                        alert("The file size is greater than 2mb")
                    }else if(r.data.status==2){
                        bo.loadingModal('hide')
                        alert("You have already registered for Research Expo")
                    }
                    else{
                        bo.loadingModal('hide')
                        alert("There is something wrong.Please try again")
                        window.location.pathname="/2019/ceawebsite/profile"
                    }
                })

        }else{
            bo.loadingModal('hide')
            alert('please check your details again')
        }

    }

    $scope.namechange=function(){

        if($scope.ename.match($scope.namepattern)){
            $scope.nameisvalid=true
        }else{
            $scope.nameisvalid=false
        }


    }   
    $scope.phonechange = function(){

        if($scope.ephone.match($scope.mobilepattern)){
            $scope.phoneisvalid=true
        }else{
            $scope.phoneisvalid=false
        }

    }
    $scope.clgnamechange = function(){

        if($scope.eclgname.match($scope.namepattern)){
            $scope.collegenameisvalid=true
        }else{
            $scope.collegenameisvalid=false
        }
    }

    $scope.editdetails=function(){
        // $scope.$dismiss('close')
        console.log('editing')
        console.log($scope.nameisvalid,$scope.phoneisvalid,$scope.collegenameisvalid)
        if($scope.nameisvalid && $scope.phoneisvalid && $scope.collegenameisvalid){
            $http({
                method:"post",
                url:"editdetails.php",
                data:{
                    name:$scope.ename,
                    phone:$scope.ephone,
                    clgname:$scope.eclgname
                },
                headers:{'Content-Type':'application/x-form-www-urlencoded'}
            }).then(function(r){
                    if(r.data.status == 1){
                            window.location.pathname = "/2019/ceawebsite/profile"
                    }
            })
        }
    }

    $scope.pass1change=function(){
        if($scope.pass1.match($scope.passwordpattern)){
            $scope.pass1isvalid = true
        }else{
            $scope.pass1isvalid = false
        }

    }

    $scope.pass2change=function(){
        if($scope.pass2.match($scope.passwordpattern)){
            $scope.pass2isvalid = true
        }else{
            $scope.pass2isvalid = false
        }

    }

    $scope.pass3change=function(){
        if($scope.pass3.match($scope.passwordpattern)){
            $scope.pass3isvalid = true
        }else{
            $scope.pass3isvalid = false
        }

    }
    $scope.updatepassword=function(){
        console.log($scope.pass1,$scope.pass2,$scope.pass3)
        console.log($scope.pass1isvalid , $scope.pass2isvalid , $scope.pass3isvalid)
        if($scope.pass1isvalid && $scope.pass2isvalid && $scope.pass3isvalid){
            $http({
                method:"post",
                url:"updatepass.php",
                data:{
                    old:$scope.pass1,
                    new:$scope.pass2,
                    renew:$scope.pass3

                },
                headers:{'Content-Type':'application/x-form-www-urlencoded'}
            }).then(function(r){
                console.log(r)
                if(r.data.status==1){
                    localStorage.setItem("loggedin",false)
                    setTimeout(function(){
                        window.location.pathname="/2019/ceawebsite/login"
                    },2000)
                    
                }
            })
        }

    }


})

x.controller("loader",function($scope){


    var bo = document.getElementById("loadingg")
    bo = angular.element(bo)
    bo.loadingModal({
        text:'Loading....'
    })
    bo.loadingModal('animation','foldingCube').loadingModal('backgroundColor', 'red')
  


})