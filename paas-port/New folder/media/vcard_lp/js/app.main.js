///#source 1 1 /Scripts/jquery/jquery.touchwipe.js
/**
 * jQuery Plugin to obtain touch gestures from iPhone, iPod Touch and iPad, should also work with Android mobile phones (not tested yet!)
 * Common usage: wipe images (left and right to show the previous or next image)
 *
 * @author Andreas Waltl, netCU Internetagentur (http://www.netcu.de)
 * @version 1.0 (15th July 2010)
 */
(function($) {
   $.fn.touchwipe = function(settings) {
      var config = {
         min_move_x: 20,
         wipeLeft: function() { alert("left"); },
         wipeRight: function() { alert("right"); },
         preventDefaultEvents: true
      };

      if (settings) $.extend(config, settings);

      this.each(function() {
         var startX;
         var isMoving = false;

         function cancelTouch() {
            this.removeEventListener('touchmove', onTouchMove);
            startX = null;
            isMoving = false;
         }

         function onTouchMove(e) {
            if(config.preventDefaultEvents) {
               e.preventDefault();
            }
            if(isMoving) {
               var x = e.touches[0].pageX;
               var dx = startX - x;
               if(Math.abs(dx) >= config.min_move_x) {
                  cancelTouch();
                  if(dx > 0) {
                     config.wipeLeft();
                  }
                  else {
                     config.wipeRight();
                  }
               }
            }
         }

         function onTouchStart(e)
         {
            if (e.touches.length == 1) {
               startX = e.touches[0].pageX;
               isMoving = true;
               this.addEventListener('touchmove', onTouchMove, false);
            }
         }

         try {
            this.addEventListener('touchstart', onTouchStart, false);
         } catch(tError) {

         }
      });

      return this;
   };

})(jQuery);

///#source 1 1 /Styles/mobile-frontend/js/app.common.js
String.prototype.format = function () {
   return String.format(this, arguments.length == 1 ? arguments[0] : arguments);
};


String.format = function (fSource, fParams) {
   var _toString = function (fObject, o) {
      var ctor = function (fObject) {
         if (typeof fObject == 'number')
            return Number;
         else if (typeof fObject == 'boolean')
            return Boolean;
         else if (typeof fObject == 'string')
            return String;
         else
            return fObject.constructor;
      }(fObject);
      var proto = ctor.prototype;
      var tFormatter = typeof fObject != 'string' ? proto ? proto.format || proto.toString : fObject.format || fObject.toString : fObject.toString;
      if (tFormatter) {
         if (typeof o == 'undefined' || o == "")
            return tFormatter.call(fObject);
         return tFormatter.call(fObject, o);
      }
      return "";
   };
   if (arguments.length == 1)
      return function () {
         return String.format.apply(null, [fSource].concat(Array.prototype.slice.call(arguments, 0)));
      };
   if (arguments.length == 2 && typeof fParams != 'object' && typeof fParams != 'array')
      fParams = [fParams];
   if (arguments.length > 2)
      fParams = Array.prototype.slice.call(arguments, 1);
   fSource = fSource.replace(/\{\{|\}\}|\{([^}: ]+?)(?::([^}]*?))?\}/g, function (match, num, format) {
      if (match == "{{") return "{";
      if (match == "}}") return "}";
      if (typeof fParams[num] != 'undefined' && fParams[num] !== null) {
         return _toString(fParams[num], format);
      } else {
         return "";
      }
   });
   return fSource;
};

Date.parseDate = function (fDateString) {
   var tMillis = Date.parse(fDateString);
   if (isNaN(tMillis)) {
      if (fDateString) {
         if (fDateString.match(/\+[\d]{4}$/))
            return new Date(fDateString.substr(0, fDateString.length - 5));
      }
   }

   return new Date(tMillis);
};

function isEventSupported(fEventName, fEl) {
   var tEl = document.createElement(fEl || "div");
   var tEventName = "on" + fEventName;
   var tIsSupported = (tEventName in tEl);
   if (!tIsSupported) {
      tEl.setAttribute(fEventName, "return;");
      tIsSupported = typeof tEl[tEventName] === "function";
   }
   tEl = null;
   return tIsSupported;

}

LkEnv = {
   IsMobile: function() {
      return $('.resolution-indicator').css('display') == 'block';
   },
   Mode: function () {
      var pMode = $("body").attr("mode");
      if (!pMode) {
         pMode='page';
      }
      return pMode;
   },
   IsPreview: function () {
      var pIsPreview = $("body").attr("is_preview");
      if (pIsPreview) {
         if (pIsPreview.toLowerCase() == 'true') {
            return true;
         } else {
            return false;
         }
      } else {
         return false;
      }
   },
   StorageUrl: function () {
      var pStorageStartUrl = $("body").attr("storage_start_url");
      return pStorageStartUrl;
   },
   handlersRoot: function () {
      var pRelativeStarUrlPart = $("body").attr("relative_start_url");
      if (pRelativeStarUrlPart != null && pRelativeStarUrlPart != '') {
         return pRelativeStarUrlPart;
      }
      return '/';
   },
   getQueryString: function() {
      var tR = {}, tQ = location.search.substring(1), tParser = /([^&=]+)=([^&]*)/g, tPair;
      while (tPair = tParser.exec(tQ))
         tR[decodeURIComponent(tPair[1])] = decodeURIComponent(tPair[2]);
      return tR;
   },
   getDomain: function(fLink) {
      var tStart = (fLink || "").indexOf('//');
      if(tStart < 0)
         return false;
      tStart += 2;
      var tEnd1 = fLink.indexOf(':', tStart);
      var tEnd2 = fLink.indexOf('/', tStart);
      var tEnd = (tEnd1 < 0 ? tEnd2 : Math.min(tEnd1, tEnd2));
      return fLink.substring(tStart, tEnd);
   },

   formatter: {
      phone: function(fPhone) {
         if(!fPhone || !fPhone.length || !fPhone.split)
            return fPhone;

         var tPhone = fPhone.split(/[^0-9]/).join('');
         if(tPhone.length <= 3)
            return tPhone;

         var tResult = l10n.formatPhone(tPhone);
         if(!tResult) {
            tResult = tPhone;
            var tLength = tPhone.length;
            switch (tLength) {
               case 4: case 5: case 6: case 7:
                  tResult = tPhone.substr(0, tLength - 3) + '-' + tPhone.substr(tLength - 3);
                  break;
               case 8: case 9:
                  tResult = tPhone.substr(0, tLength - 6);
                  tResult += '-' + tPhone.substr(tLength - 6, 3);
                  tResult += '-' + tPhone.substr(tLength - 3);
                  break;
               case 10: case 11:
                  tResult = tPhone.substr(0, tLength - 7);
                  tResult += '-' + tPhone.substr(tLength - 7, 3);
                  tResult += '-' + tPhone.substr(tLength - 4);
                  break;
            }

            if(fPhone.charAt(0) == '+')
               tResult = '+' + tResult;
         }
         return tResult;
      }
   },

   cookies: {
      get:function(fName) {
         var tName = fName + "=";
         var tCookies = document.cookie.split(';');
         for(var tI=0; tI < tCookies.length; tI++) {
            var tCookie = tCookies[tI];
            while (tCookie.charAt(0)==' ') tCookie = tCookie.substring(1,tCookie.length);
            if (tCookie.indexOf(tName) == 0) return tCookie.substring(tName.length,tCookie.length);
         }
         return null;
      },
      set:function(fName, fValue, fMinutes, fPath, fDomain, fSecure) {
         tExpires = "";
         if (fMinutes) {
            var tDate = new Date();
            tDate.setTime(tDate.getTime() + (fMinutes * 60 * 1000));
            var tExpires = "; expires=" + tDate.toGMTString();
         }
         document.cookie = fName + "=" + encodeURIComponent(fValue) +
             ((expires) ? "; expires=" + tExpires : "") +
             ((fPath) ? "; path=" + encodeURI(fPath) : "") +
             ((fDomain) ? "; domain=" + encodeURI(fDomain) : "") +
             ((fSecure) ? "; secure" : "");
      }
   },

   browser: {
      supportPositionFixed: true
   },

   dynamicMobileStyleSheet: null,
   addMainCssRule: function (selectors, rules) {
      if (!LkEnv.dynamicMobileStyleSheet) {
         for (var tI = 0; tI < document.styleSheets.length; tI++) {
            if (document.styleSheets[tI].ownerNode.getAttribute('data-type') == 'mobile') {
               LkEnv.dynamicMobileStyleSheet = document.styleSheets[tI];
            }
         }
      }
      if (LkEnv.dynamicMobileStyleSheet) {
         if (LkEnv.dynamicMobileStyleSheet.addRule) {
            for (var i = 0; i < selectors.length; ++i) {
               LkEnv.dynamicMobileStyleSheet.addRule(selectors[i], rules);
            }
         } else {
            LkEnv.dynamicMobileStyleSheet.insertRule(selectors.join(',') + '{' + rules + '}', LkEnv.dynamicMobileStyleSheet.cssRules.length);
         }
      }
   },
   dynamicMediumStyleSheet: null,
   addMediumCssRule: function (selectors, rules) {
      if (!LkEnv.dynamicMediumStyleSheet) {
         for (var tI = 0; tI < document.styleSheets.length; tI++) {
            if (document.styleSheets[tI].ownerNode.getAttribute('data-type') == 'medium') {
               LkEnv.dynamicMediumStyleSheet = document.styleSheets[tI];
            }
         }
      }
      if (LkEnv.dynamicMediumStyleSheet) {
         var mediaRules = null;
         for (var tJ = 0; tJ < LkEnv.dynamicMediumStyleSheet.cssRules.length; tJ++) {
            if (LkEnv.dynamicMediumStyleSheet.cssRules[tJ].type == CSSRule.MEDIA_RULE) {
               mediaRules = LkEnv.dynamicMediumStyleSheet.cssRules[tJ];
            }
         }
         if (mediaRules != null) {
            mediaRules.insertRule(selectors.join(',') + '{' + rules + '}', mediaRules.cssRules.length);
         }
      }
   },
};

LkGeo = { position: { lat:0, lon:0 } };
(function(){
   var tGeoLocInited = false;
   var tGeoLocReady = false;
   var tGeoLocNotAvailable = false;
   var tGeoLocRedirect = false;
   var tGeoLocRedirectDisabled = false;

   var tListeners = [];

   LkGeo.cachePositionFor = function (fDomain, fLat, fLon) {
      var tHandlerPath = (fDomain ? 'http://' + fDomain + '/' : '');
      if (tHandlerPath == '') {
         tHandlerPath = LkEnv.handlersRoot();
      }
      jQuery.getScript(tHandlerPath + "Handlers/Location/Cache.ashx?lat=" + encodeURI(fLat) + "&lon=" + encodeURI(fLon));
   };

   function setGeoPosition(fLat, fLon, fSkipCache) {
      if(!fSkipCache && LkGeo.position.lat != fLat && LkGeo.position.lon != fLon) {
         LkGeo.cachePositionFor("", fLat, fLon);
      }
      LkGeo.position.lat = fLat;
      LkGeo.position.lon = fLon;
      tGeoLocReady = true;
      tGeoLocNotAvailable = (LkGeo.position.lat == 0 && LkGeo.position.lon == 0);
   }

   (function () {
      if (LkEnv.getQueryString().notdected == "true") {
         tGeoLocRedirectDisabled = true;
      }

      if (LkEnv.getQueryString().detected=="true" && LkEnv.getQueryString().lat && LkEnv.getQueryString().lon) {

         setGeoPosition(parseFloat(LkEnv.getQueryString().lat), parseFloat(LkEnv.getQueryString().lon));
         tGeoLocInited = true;

         if (history && history.pushState) {
            var currentUrl = location.href.slice(0, location.href.indexOf('detected')-1);
            history.pushState(null, "", currentUrl);
         }

         return !tGeoLocNotAvailable;

      } else {

         var tCookie = LkEnv.cookies.get("pct");
         if (!tCookie)
            return false;

         var tValues = tCookie.split(',');
         if (tValues.length != 2)
            return false;

         tGeoLocInited = true;

         setGeoPosition(parseFloat(tValues[0]), parseFloat(tValues[1]), true);

         return !tGeoLocNotAvailable;
      }
   })();

   function isRedirectEnabled() {
      return true;
   };

   function generateResponse() {
      if (isRedirectEnabled()) {
         return {
            available: !tGeoLocNotAvailable,
            ready: tGeoLocReady,
            position: LkGeo.position,
            redirect: tGeoLocRedirect
         };
      } else {
         return {
            available: !tGeoLocNotAvailable,
            ready: tGeoLocReady,
            position: LkGeo.position,
            redirect: false
         };
      }
   }

   function notify() {
      var tResult = generateResponse();
      for(var tI = 0; tI < tListeners.length; tI++)
         tListeners[tI](tResult);
      tListeners = [];
   }

   LkGeo.showRedirectPopup = function () {
      if (!LkEnv.IsPreview()) {
         var wrapper = $('#https-redirect-wrapper');
         wrapper.text(location.hostname + ' would like to use your current location.');
         $("#https-redirect-wrapper")
            .dialog({
               modal: true,
               resizable: false,
               dialogClass: "https-redirects-popup",
               width: 220,
               buttons: [
                  {
                     text: "OK",
                     click: function() {
                        $(this).dialog("close");
                        var returnUrl = window.location.href;
                        if (returnUrl.indexOf('#')>0) {
                           returnUrl = returnUrl.slice(0, returnUrl.indexOf('#'));
                        }
                        var url = 'https://files.safemobi.net/geodetect.aspx?url=' + encodeURIComponent(returnUrl);
                        window.location.href = url;
                     }
                  },
                  {
                     text: "Don't allow",
                     click: function() {
                        $(this).dialog("close");
                        tGeoLocNotAvailable = true;
                        tGeoLocReady = true;
                        notify();
                     }
                  }
               ]
            });
      }
   };

   LkGeo.setPosition = function(fLat, fLon) {
      setGeoPosition(fLat, fLon);
   };

   LkGeo.loadCoordinates = function(fListener, fRefresh) {
      if(!fListener || !jQuery.isFunction(fListener))
         return generateResponse();

      tListeners.push(fListener);

      if (!tGeoLocInited || fRefresh) {
         tGeoLocInited = true;
         tGeoLocReady = false;
         if (navigator.userAgent.match(/^blackberry/i) && typeof blackberry != 'undefined' && blackberry.location && blackberry.location.GPSSupported) {
            var tUpdated = false;

            function callbackGeo() {

               (blackberry.location.latitude, blackberry.location.longitude);

               if (!tUpdated)
                  notify();

               tUpdated = true;
            }

            blackberry.location.setAidMode(2);
            blackberry.location.onLocationUpdate(callbackGeo);
            blackberry.location.refreshLocation();
         } else if (navigator.geolocation) {
            if (!tGeoLocRedirectDisabled) {
               navigator.geolocation.getCurrentPosition(
                  function(fPosition) {
                     setGeoPosition(fPosition.coords.latitude, fPosition.coords.longitude);
                     notify();
                  },
                  function (fError) {
                     if (fError.message && (fError.message.indexOf('secure') >= 0 
                        || fError.message.indexOf('Origin does not have permission')>=0)
                        && isRedirectEnabled()) {
                        tGeoLocRedirect = true;
                        LkGeo.showRedirectPopup();
                     } else {
                        tGeoLocNotAvailable = true;
                        tGeoLocReady = true;
                        notify();
                     }
                  },
                  { maximumAge: 0, timeout: 10000 }
               );
            } else {
               tGeoLocNotAvailable = true;
               tGeoLocReady = true;
               notify();
            }
         } else {
            tGeoLocNotAvailable = true;
            tGeoLocReady = true;
         }
      }
      if (tGeoLocReady)
         notify();

      return generateResponse();
   };

   LkGeo.positionByZip = function(fZip, fCountryCode, fListener) {
      if(!fListener || !jQuery.isFunction(fListener))
         return generateResponse();

      jQuery.ajax(LkEnv.handlersRoot() + 'Handlers/Location/ByZIP.ashx', {
         data:{ zip:(fZip || '').trim(), country:fCountryCode },
         cache:true,
         timeout:5000,
         success: function(fData, fStatus, fXHR) {
            fListener(fData);
         },
         error: function(fXHR, fStatus, fError) {
            alert('Error: ' + fStatus);
         }
      });
   };
})();

LkExtender = { };
(function () {

   var pExtenders = [];

   LkExtender.register = function (fContentHandler, standard) {
      if (standard == undefined) {
         standard = true;
      }
      if (fContentHandler && jQuery.inArray(fContentHandler, pExtenders) < 0)
         pExtenders.push({ handler: fContentHandler, standard: standard });
   };

   LkExtender.extend = function (fContentHolder, forStandard) {
      if (fContentHolder) {
         if (forStandard == undefined) {
            forStandard = null;
         }
         jQuery.each(pExtenders, function (fIndex, fContentHandler) {
            if ((forStandard && fContentHandler.standard) || (!forStandard && !fContentHandler.standard) || forStandard==null) {
               fContentHandler.handler(fContentHolder);
            }
         });
      }
   };

   LkExtender.register(function() {
      if (jQuery('.content-mobile .main-footer a').length != 0) {
         jQuery('.content-mobile .main-footer').addClass('not-empty');
      } else {
         jQuery('.content-mobile .main-footer').removeClass('not-empty');
      }

      if (!LkEnv.IsPreview()) {
         jQuery('.video-background-buttons .sound').click(function() {
            jQuery(this).hide();
            jQuery(this).parent().find('.mute').show();

            jQuery(this).closest('.row-outer').find('video').get(0).pause();
            jQuery(this).closest('.row-outer').find('video').get(0).muted = false;
            jQuery(this).closest('.row-outer').find('video').get(0).currentTime = 0;
            jQuery(this).closest('.row-outer').find('video').get(0).play();
            return false;
         });

         jQuery('.video-background-buttons .mute').click(function() {
            jQuery(this).hide();
            jQuery(this).parent().find('.sound').show();

            jQuery(this).closest('.row-outer').find('video').get(0).pause();
            jQuery(this).closest('.row-outer').find('video').get(0).muted = true;
            jQuery(this).closest('.row-outer').find('video').get(0).currentTime = 0;
            jQuery(this).closest('.row-outer').find('video').get(0).play();
            return false;
         });
      }
   });
})();

l10n.fill = function(fLabel) {
   var tResult = l10n[fLabel] || "";
   for (var tI = 1; tI < arguments.length; tI++)
      tResult = tResult.replace("{" + (tI - 1) + "}", arguments[tI]);
   return tResult;
};

l10n.simpleDate = function(fLabel, fDate) {
   var tResult = l10n[fLabel] || "";
   var tDate = fDate || new Date();
   tResult = tResult.replace("{dd}", tDate.getDate());
   tResult = tResult.replace("{DD}", (tDate.getDate() < 10 ? '0' + tDate.getDate() : tDate.getDate()));
   tResult = tResult.replace("{mm}", tDate.getMonth() + 1);
   tResult = tResult.replace("{MM}", (tDate.getMonth() < 9 ? '0' + (tDate.getMonth() + 1) : (tDate.getMonth() + 1)));
   tResult = tResult.replace("{yy}", tDate.getYear());
   tResult = tResult.replace("{yyyy}", tDate.getFullYear());
   return tResult;
};

l10n.formatPhone = function(fPhone) {
   if (!('common.phoneFormat' in l10n))
      return false;

   var tFunc = l10n['common.phoneFormat'];
   return tFunc(fPhone);
};

$.fn.removeCss = function (toDelete) {
   var props = $(this).attr('style').split(';');
   var tmp = -1;
   for (var p = 0; p < props.length; p++) { if (props[p].indexOf(toDelete) !== -1) { tmp = p } };
   if (tmp !== -1) {

      delete props[tmp];
   }
   return $(this).attr('style', props.join(';') + ';');
}
///#source 1 1 /Styles/mobile-frontend/js/app.browsers-compatibility.js
var gApp = { gallery: { animation: { off:false } } };
jQuery(document).ready(
   function () {
      if (navigator.userAgent.match(/blackberry/i)) {
         jQuery('.block-video-youtube').each(function () {
            var tIframe = jQuery(this).find('iframe').get(0);
            var tSt = 'www.youtube.com/embed/';
            if (tIframe.src && tIframe.src.length && tIframe.src.indexOf(tSt) > 0) {
               var tSrc = tIframe.src;
               var tStart = tSrc.indexOf(tSt) + tSt.length;
               var tEnd = tSrc.lastIndexOf('?');
               jQuery(tIframe).replaceWith('<a style="display:block;padding:40px 0;text-align:center;" href="http://m.youtube.com/watch?v=' + tSrc.substring(tStart, (tEnd < 0 ? undefined : tEnd)) + '">' + l10n.fill('youTubeVideo.blackBerryLinkText') + '</a>');
            }
         });

         if(navigator.userAgent.toLowerCase().indexOf('blackberry') == 0) {
            function fixImageSize() {
               var tThis = this;
               if (this.complete) {
                  fixImageLoadTrouble(tThis);
               } else if (this.complete === false) {/* do not mix this statement and typeof this.complete == 'undefined' */
                  setTimeout(function () { fixImageLoadTrouble(tThis); }, 200);
               } else if (typeof this.complete == 'undefined') {
                  setTimeout(function () { fixImageLoadTrouble(tThis); }, 200);
               }
            }

            function fixImageLoadTrouble(fImg) {
               if (!fImg) return;
               var tImg = jQuery(fImg);
               if (tImg.width() < 1) {
                  setTimeout(function () { fixImageLoadTrouble(fImg); }, 200);
                  return;
               }
               tImg.width(tImg.width());
            }

            jQuery('img').load(fixImageSize).each(fixImageSize);

            jQuery('.block-image-and-text').each(function(){
               var tThis = jQuery(this);
               //if(tThis.find('.no-text-wrapping:first').length > 0) {
                  var tImageHolder = tThis.find('.image-holder');
                  var tMaxWidth = tImageHolder.css('max-width');
                  if(tMaxWidth && tMaxWidth.length && tMaxWidth.lastIndexOf('%') == (tMaxWidth.length - 1)) {
                     tImageHolder.width(parseInt(tMaxWidth) * tThis.width() / 100);
                     tImageHolder.css('height', 'auto');
                  }
               //}
            });

            gApp.gallery.animation.off = true;
         }
      } else if (navigator.userAgent.match(/Android\s2\.1/i)) {
         jQuery('.block-video-youtube').each(function () {
            var tIframe = jQuery(this).find('iframe').get(0);
            var tSt = 'www.youtube.com/embed/';
            if (tIframe.src && tIframe.src.length && tIframe.src.indexOf(tSt) > 0) {
               var tSrc = tIframe.src;
               var tStart = tSrc.indexOf(tSt) + tSt.length;
               var tEnd = tSrc.lastIndexOf('?');
               jQuery(tIframe).replaceWith('<embed src="http://www.youtube.com/v/' + tSrc.substring(tStart, (tEnd < 0 ? undefined : tEnd)) + '" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="100%" wmode="transparent"></embed>');
            }
         });
      } else {
         /* fix samsung android phones bug */
         //jQuery(window).resize(function() {
         //   jQuery('.block-video-youtube').each(function(){
         //      jQuery(this).siblings().attr('width', jQuery(this).width() + 'px').width(jQuery(this).width());
         //   });
         //}).resize();
      }

      try {
         (function () {
            var container = document.body;
            if (document.createElement && container && container.appendChild && container.removeChild) {
               var el = document.createElement('div');
               if (!el.getBoundingClientRect) return null;
               el.innerHTML = 'x';
               el.style.cssText = 'position:fixed;top:100px;';
               setTimeout(
                  function () {
                     container.appendChild(el);
                     var originalHeight = container.style.height, originalScrollTop = container.scrollTop;
                     container.style.height = '3000px';
                     container.scrollTop = 500;
                     var elementTop = el.getBoundingClientRect().top;
                     container.style.height = originalHeight;
                     var isSupported = !!(elementTop === 100);
                     container.removeChild(el);
                     container.scrollTop = originalScrollTop;
                     LkEnv.browser.supportPositionFixed = (el.style.position === 'fixed' && !navigator.userAgent.match(/OS\s4_\d(_\d)?\slike\sMac\sOS\sX/i));
                   },
                  50
                );
            }
         })();
      } catch(tE) {

      }

   }
);
///#source 1 1 /Styles/mobile-frontend/js/app.service.js
LkRequestItem = { success: function () { }, error: function () { } };

var commonTimeOut = 10000;

var LkCallerList = function (fInitial, fThis) {
   var pList = [];

   this.push = function(fCallback, fThis) {
      pList.push({ c: fCallback, t: fThis || null });
   };

   this.notify = function(fParams) {
      for(var tI = 0; tI < pList.length; tI++)
         pList[tI].c.apply(pList[tI].t, fParams);
   };

   if(jQuery.isFunction(fInitial))
      this.push(fInitial, fThis);
};

LkRequestItem = function(fSuccess, fError, fComplete, fRequestModel) {
   var pSuccess = new LkCallerList(fSuccess);
   var pError = new LkCallerList(fError);
   var pComplete = new LkCallerList(fComplete);

   var tCall = function(fCallback, fParams) {
      tParams = fParams || [];
      if(jQuery.isPlainObject(fRequestModel)) {
         var tParams = Array.prototype.slice.call(fParams);
         tParams.push(fRequestModel);
      }
      fCallback.notify(tParams);
   };

   this.success = function() {
      tCall(pSuccess, arguments);
      tCall(pComplete, arguments);
   };

   this.error = function() {
      tCall(pError, arguments);
      tCall(pComplete, arguments);
   };

   this.onSuccess = function(fInitial, fThis) {
      pSuccess.push(fInitial, fThis);
   };
};

Service = {
   request: function(fId, fData, fSpecialParams, fCallback, fCallbackError, fCallbackComplete, fObjectState) {
      var tCallback = Service.item(fCallback, fCallbackError, fCallbackComplete, fObjectState);

      var tParams = jQuery.extend({
         type: "POST",
         cache: false,
         dataType: "json",
         contentType: "application/json",
         timeout: commonTimeOut,
      }, (fSpecialParams && jQuery.isPlainObject(fSpecialParams)) ? fSpecialParams : { });

      var now = new Date();
      var n = now.getTime();
      tParams.url = LkEnv.handlersRoot() + fId;
      if (tParams.url.indexOf('?') != -1) {
         tParams.url += "&n=" + n;
      } else {
         tParams.url += "?n=" + n;
      }
      tParams.data = fData;
      tParams.success = function(fData, fTextStatus, fXHR) {
         switch (fXHR.status) {
         case 200:
            if (fData && fData.Success) {
               tCallback.success(fData.Data);
            } else {
               tCallback.error(fData || { Success: false, Data: null, Messages: [l10n.fill('service.errorMessage')] });
            }
            return;
         case 500:
            tCallback.error(fData || { Success: false, Data: null, Messages: [l10n.fill('service.errorMessage')] });
            return;
         default:
         }
      };
      tParams.error = function(fXHR, fStatus, fThrownError) {
         try {
            tCallback.error({ Success: false, Data: null, Messages: [{ Message: 'Service is not available.', Field: '' }] });
         } catch(tE) {
            console.log(tE);
         }
      };

      jQuery.ajax(tParams);
   },

   item: function(fSuccess, fError, fComplete, fRequestModel) {
      return fSuccess instanceof LkRequestItem ? fSuccess : new LkRequestItem(fSuccess, fError, fComplete, fRequestModel);
   },

   success: function(fCallback, fData) {
      fCallback instanceof LkRequestItem ? fCallback.success.apply(fCallback, fData) : fCallback.apply(fCallback, fData);
   }
};
///#source 1 1 /Styles/mobile-frontend/js/app.validation.js
(function (jQuery) {
   var pClassInvalid = "invalid";

   jQuery.fn.extend({
      removeValidatableForm: function () {
         return this.each(function () {
            var tForm = jQuery(this);
            var tList = tForm.find('input, select, textarea');

            setElementValid(tList, true);

            tList.filter('.validate-required').unbind('keyup change');
            tList.filter('.validate-number').unbind('keyup change');
         });
      },
      validatableForm: function(fCheckSubmit) {
         return this.each(function() {
            var tForm = jQuery(this);
            var tList = tForm.find('input, select, textarea');

            setElementValid(tList, true);

            tList.filter('.validate-required').bind('keyup change', function () {
               var tThis = jQuery(this);
               setElementValid(tThis, tThis.val().trim().length > 0);
            });

            tList.filter('.validate-number').bind('keyup change', function () {
               var tThis = jQuery(this);

               var tAllowEmpty = tThis.data('allow-empty') || false;
               var tPrecision = parseInt(tThis.data('precision')) || 0;
               var tMin = parseFloat(tThis.data('min'));
               var tMax = parseFloat(tThis.data('max'));

               var tValid = true;
               if (!(this.value == "" && tAllowEmpty)) {
                  var tRegExp = new RegExp("^[0-9]+" + (tPrecision > 0 ? "(\\.[0-9]{0," + tPrecision + "})?" : "") + "$", "g");
                  tValid = (this.value.match(tRegExp) != null);

                  var tValue = parseFloat(this.value);
                  if (tValid && !isNaN(tMin)) tValid = (tMin <= tValue);
                  if (tValid && !isNaN(tMax)) tValid = (tMax >= tValue);
               }

               setElementValid(tThis, tValid);
            });
            if(fCheckSubmit)
               tForm.submit(function() {
                  return jQuery(this).validateForm();
               });
         });
      },
      validateForm: function() {
         var tResult = true;
         var tInvalidClass = '.' + pClassInvalid;
         this.each(function() {
            jQuery(this).find('input, select, textarea').each(function () {
               tResult = !jQuery(this).change().is(tInvalidClass) && tResult;
            });
         });
         return tResult;
      }
   });


   function setElementValid(fElement, fValid) {
      if (fValid)
         fElement.removeClass(pClassInvalid);
      else
         fElement.addClass(pClassInvalid);
   }

   LkExtender.register(function (fRoot) {
      if (fRoot) {
         jQuery(fRoot).find('form.async-validate').validatableForm(true);
      }
   });
})(jQuery);
///#source 1 1 /Styles/mobile-frontend/js/app.collapsibles.js
(function (jQuery) {
   var tEvent = 'click';//isEventSupported('touchstart') ? 'touchstart' : 'click';

   function setupCollapsibles(fRoot) {
      var handler = function () {
         var tContainer = jQuery(this).parent('.collapsible-container');
         var tContent = tContainer.find('> .collapsible-content');
         if (tContainer.find('> .collapsible-trigger > .wrapper > .header-glyph').css('display') == 'none') {
            return false;
         }
         if (this.disabled)
            return;
         var tThis = this;
         tThis.disabled = true;

         if (tContent.is(':animated'))
            return false;
         tContent.stop(true, true).slideToggle(700, function() {
            tContainer.toggleClass('opened');
            tThis.disabled = false;
            if (tContent.css('display') == 'none') {
               tContent.removeAttr('style');
            } else {
               $(window).trigger('resize');
               $(window).trigger('resize');
            }
         });
      };

      var menuHandler = function () {
         var tContainer = jQuery(this).parent('.collapsible-menu');
         var tContent = tContainer.find('> .collapsible-content');
         if (tContainer.find('> .collapsible-trigger > .header-glyph').css('display') == 'none') {
            return false;
         }
         if (this.disabled)
            return;
         var tThis = this;
         tThis.disabled = true;

         if (tContent.is(':animated'))
            return false;
         tContent.stop(true, true).slideToggle(700, function () {
            tContainer.toggleClass('opened');
            tThis.disabled = false;
            tContent.removeAttr('style');
         });
      };

      jQuery('.collapsible-container .collapsible-trigger', fRoot).unbind(tEvent);
      jQuery('.collapsible-container .collapsible-trigger', fRoot).bind(tEvent, handler);
      if (fRoot.hasClass('collapsible-container')) {
         jQuery('.collapsible-trigger', fRoot).unbind(tEvent);
         jQuery('.collapsible-trigger', fRoot).bind(tEvent, handler);
      }
      jQuery('.collapsible-menu .collapsible-trigger', fRoot).unbind(tEvent);
      jQuery('.collapsible-menu .collapsible-trigger', fRoot).bind(tEvent, menuHandler);
   }

   LkExtender.register(setupCollapsibles);
})(jQuery);

///#source 1 1 /Styles/mobile-frontend/js/app.ol-maps.js
/*
 * OpenLayers map for pijnz project
 * Version: 1.0
 */
var OLCurrSection=0;

(function($){
	
	var defaults = {
		'osm': '//maps.mobilebuilder.net/${z}/${x}/${y}.png',
		'lat': 32.799714,
		'lon': -96.786499,
		'zoom': 15,
		'autofit': true,
		'markerImage': {
			'src': 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=|00FF00|000000',
			'width': 21
		},
		
		'popupDetails': {
			'font-size': '12px',
			'font-family': 'Arial, Verdana',
			'color': '#000',
			'background': '#fff',
			'width': 200,
			'height': 120,
			'overflow': 'hidden'
		},
		
		locations: []
			
	};
	
	var self = self||{};
	var data = data||{};
	
		function init(options) {
		   
			data.options = $.extend( true, defaults, options );
			OLCurrSection++;
			data.mapId = 'id-'+OLCurrSection;
			data.mapContainer = $('<div />').attr('id', data.mapId).css({'width':'100%', 'height': '100%', 'border': 'none', 'margin': 0, 'padding': 0});
			$(self).empty().append(data.mapContainer);
			
			data.map = new OpenLayers.Map( data.mapId, { theme: null });
	        
		    var mapCenter       = _makeLocation(data.options.lat, data.options.lon);
		    data.markers = new OpenLayers.Layer.Markers( "Markers" );
		    
			data.map.addLayer(
					new OpenLayers.Layer.OSM('osm', data.options.osm, 
						{
							tileOptions: {
								eventListeners: {
									'loadend': function(evt) {
													$('.olControlAttribution', self).hide();
												}
								}
							}
						})
			);
			data.map.addLayer(data.markers);
			
			if ($.isArray(data.options.locations)) {
				for (i=0; i<data.options.locations.length; i++) {
				    _addMarker(data.options.locations[i]);
				}
			}
	
			data.map.setCenter(mapCenter, data.options.zoom);
			$('.olAlphaImg', self).css('cursor', 'pointer');
			if (data.options.autofit) 
			   data.map.zoomToExtent(data.markers.getDataExtent());
		}
	
		String.prototype.truncateDescr = function(n,useWordBoundary){
		        var toLong = this.length>n,
		            s_ = toLong ? this.substr(0,n-1) : this;
		        s_ = useWordBoundary && toLong ? s_.substr(0,s_.lastIndexOf(' ')) : s_;
		        return  toLong ? s_ + '&hellip;' : s_;
		};
		/* private functions */
		function _truncate(str) {
			return str.truncateDescr(data.options.maxDescriptionLength, true);
		}
		
		function _makePopupHTML(location) {
		    console.log(location)
			var popupBody = $('<div class="popup-body" />');
			if (location.phone) {
			    if (location.phone.indexOf('tel:')<0)
			        popupBody.append('<div class="popup-body-phone"><a href="tel:' + location.phone + '">' + location.phone + '</a></div>');
			    else {
			        popupBody.append('<div class="popup-body-phone">' + location.phone + '</div>');
			    }
			}
			if (location.address) popupBody.append('<div class="popup-body-address">'+location.address+'</div>');
			if (location.description) popupBody.append('<div class="popup-body-description">'+_truncate(location.description)+'</div>');
			//if (location.linkText && location.linkUrl) popupBody.append('<div class="popup-body-link"><a href="'+location.linkUrl+'" target="_blank">'+location.linkText+'</a></div>');
			var popupTitle = "";
		    if (location.linkUrl) popupTitle = '<div class="popup-title"><a href="' + location.linkUrl + '"><strong>' + location.name + '</strong></a></div>';
		    else popupTitle ='<div class="popup-title"><strong>' + location.name + '</strong></div>';
			var container = $('<div class="map-popup-details" />')
			.append(popupTitle)
			.append(popupBody)
			.wrap('<div />');
	    		
			return container.parent().html();
		}
		
		function _makeLocation(lat, lon) {
			if (!data.fromProjection)
				data.fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
			if (!data.toProjection)
				data.toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
		    return  new OpenLayers.LonLat(lon, lat).transform( data.fromProjection, data.toProjection);
		}
		function _stylingPopup() {
			$('.map-popup-details', self).each(function() {
				var popupContainer=$(this).parent().parent().parent();
				for (cssKey in data.options.popupDetails) {
					if (cssKey != 'width' && cssKey != 'height')
						popupContainer.css(cssKey, data.options.popupDetails[cssKey]);
				}
			});
		}
		
		function _imageCalculate(location, key) {
			if (location['markerImage'] != undefined) {
				return location['markerImage'][key]||data.options.markerImage[key]; 
			} else {
				return data.options.markerImage[key];
			}
		}
		function _addMarker(location) {
			
		    var iconSize = new OpenLayers.Size(_imageCalculate(location, 'width'), _imageCalculate(location, 'width'));
			var iconOffset = new OpenLayers.Pixel(-(iconSize.w/2), -iconSize.h);
			
			var icon = new OpenLayers.Icon(_imageCalculate(location, 'src'), iconSize, iconOffset);
			var position = _makeLocation(location.lat, location.lon);
			var marker = new OpenLayers.Marker(position, icon );
			var popup = new OpenLayers.Popup(
					"locdet",
	                position,
	                new OpenLayers.Size(data.options.popupDetails.width, data.options.popupDetails.height),
	                _makePopupHTML(location),
	                true);
			popup.panMapIfOutOfView = true;
			var clickFunction = function() {
				data.map.addPopup(popup);
				_stylingPopup(popup);
				popup.show();
			};

			marker.events.register("click", 	marker, clickFunction);
			marker.events.register("touchend", 	marker, clickFunction);
			
			data.markers.addMarker(marker);
			console.log(location)
		}

   $.fn.OpenLayersMap = function(options) {
      self = this;
      init(options);
      return this.each(function() {});
   };
})(jQuery);
///#source 1 1 /Styles/mobile-frontend/js/app.video.js
(function(jQ){
   var VideoPlayer = function(fPlayerBox) {
      var tThis = this;
      var tPlayerBox = jQ(fPlayerBox);

      function tClickHandler(fE) {
         fE.preventDefault();
         var tTrigger = jQ(this);
         (tTrigger.is('.holder') ? tTrigger : tTrigger.parents('.holder')).addClass('showing');
         return false;
      }

      tPlayerBox.find('.holder').click(tClickHandler);
      tPlayerBox.find('.holder iframe').focus(function(){ });
      return this;
   };


   function videoRegistration(fRoot) {
      if(fRoot && fRoot.find) {
         fRoot.find('.block-video-youtube').each(function() {
            fRoot.data('player', new VideoPlayer(this));
         });
      }
   }
   LkExtender.register(videoRegistration);
})(jQuery);
///#source 1 1 /Styles/mobile-frontend/js/app.gallery.js
(function (jQuery) {
   function initGallery(fParent) {

      jQuery('.gallery', fParent).each(function () {
         var tThis = jQuery(this);
         var tGalleryType = tThis.data('gallery-type');
         var tSlideshowSpeed = tThis.data('slideshow-speed');
         var tSlideshow = tThis.data('slideshow');
         var tDirectionNav = tThis.data('direction-navigation');
         var tControlNavigation = tThis.data('control-navigation');
         var tCarouselItemWidth = tThis.data('carousel-item-width');
         var tImageLoading = tThis.data('image-loading');
         var tBtnClosed = tThis.data('btn-closed');
         var tBtnBlank = tThis.data('btn-blank');
         var tBtnNext = tThis.data('btn-next');
         var tBtnPrev = tThis.data('btn-prev');
         var tflexSliderAnimation = tThis.data('flex-slider-animation');
        
         if (tGalleryType == 'Thumbnails') {
             tThis.find('.thumbnails a.block-link').lightBox({
               imageLoading: tImageLoading,
               imageBtnClose: tBtnClosed,
               imageBlank: tBtnBlank,
               imageBtnNext: tBtnNext,
               imageBtnPrev: tBtnPrev,
            });
         }
         if (tGalleryType == 'Slideshow') {

            tThis.find('.flexslider').flexslider({
               animation: tflexSliderAnimation,
               animationSpeed: tflexSliderAnimation == 'fade' ? 1200 : 600,
               slideshowSpeed: tSlideshowSpeed,
               slideshow: tSlideshow,
               directionNav: tDirectionNav,
               pausePlay: false,
               controlNav:  tControlNavigation,
               smoothHeight: true,
               start: function(slider) {
                  $('body').removeClass('loading');
                  if (tControlNavigation == false) {
                     tThis.find('.flexslider').css('margin', '0');
                  }
               }
            });
         }
         if (tGalleryType == 'Carousel') {
            tThis.find('.flexslider').flexslider({
               animation: "slide",
               animationLoop: true,
               itemWidth: tCarouselItemWidth,
               slideshowSpeed: tSlideshowSpeed,
               slideshow: tSlideshow,
               directionNav: tDirectionNav,
               pausePlay: false,
               smoothHeight: true,
               start: function(slider) {
                  $('body').removeClass('loading');
               }
            });
         }
         if (tGalleryType == 'SlideshowWithThumbnails') {
            tThis.find('.flexslider').flexslider({
               animation: tflexSliderAnimation,
               animationSpeed: tflexSliderAnimation == 'fade' ? 1200 : 600,
               slideshowSpeed: tSlideshowSpeed,
               slideshow: tSlideshow,
               directionNav: tDirectionNav,
               pausePlay: false,
               controlNav: tControlNavigation,
               smoothHeight: true,
               start: function (slider) {
                  $('body').removeClass('loading');
               }
            });
         }
      });
   }
   LkExtender.register(initGallery,false);
})(jQuery);

///#source 1 1 /Styles/mobile-frontend/js/app.feed.js
jQuery(document).ready(function () {
   jQuery('.block .block-feed .link-feed').each(function () {
      var tThis = this;
      jQuery.ajax({
         url: LkEnv.handlersRoot() + 'Handlers/GetFeed.ashx',
         data: { url: this.href, count: jQuery(this).data('count'), length: jQuery(this).data('length') },
         dataType: 'json',
         success: function (fData) {
            if (!fData || !jQuery.isArray(fData.Children)) {
               alert(l10n.fill('feed.feedLoadingFailed'));
               return;
            }
            var tContainer = jQuery('<ul />');
            jQuery.each(fData.Children, function () {
               var tTitleCutter = jQuery('<div />', { text: jQuery.trim(this.Title) });
               if(tTitleCutter.text() == '')
                  return;

               var tItem = jQuery('<li />');
               var tDate = jQuery('<span class="date" />');
               if(this.PubDate && this.PubDate.length > 0) {
                  var tD = Date.parseDate(this.PubDate);
                  tDate.text(tD.toLocaleDateString());
                  tItem.append(tDate);
               }
               var tHead = jQuery('<h3 />');
               jQuery('<a/>', {
                  href: this.Link,
                  html: tTitleCutter.text(),
               }).appendTo(tHead);
               tItem.append(tHead);
               tItem.append(this.Description);
               tItem.append($('<div class="clear"/>'));
               tContainer.append(tItem);
            });
            tContainer.find('a').attr('target', '_blank');
            tContainer.find('a').attr('class', 'base-link');
            jQuery(tThis).hide().parents('.block-feed:first').prepend(tContainer);
         }
      });
   });
});

///#source 1 1 /Styles/mobile-frontend/js/app.image-as-action-map.js
jQuery(document).ready(function () {

   var tMaps = [];
   jQuery('map.image-action-map').each(function() {
      var tImage = jQuery('img[usemap=#' + this.id + ']');
      var tMap = {
         map:jQuery(this),
         image:tImage,
         imageWidth:0,//set to 0 to force first time calculating
         initialWidth:jQuery(this).data('initial-width'),
         areas: jQuery(this).find('area').map(function(){
            return {
               shape: jQuery(this).attr('shape'),
               coords: jQuery(this).attr('coords'),
               href: jQuery(this).attr('href'),
               target: jQuery(this).attr('target'),
               onclick: jQuery(this).attr('onclick')
            }
         })
      };
      tMaps.push(tMap);
   });

   var tImageMapFixAreas = function(fMap) {
      //process situation, when an image is not loaded yet
      if(!fMap.image.get(0).complete || fMap.image.width() == 0)
         return false;
      //check if nothing is changed
      if(fMap.image.width() == fMap.imageWidth)
         return true;

      fMap.imageWidth = fMap.image.width();

      var tMultiplier = fMap.imageWidth / fMap.initialWidth;

      //create areas for new size
      fMap.map.empty();
      jQuery.each(fMap.areas, function(fNameArea, fValueArea) {
         var tArea = jQuery('<area />');

         tArea.attr('shape', fValueArea.shape).attr('href', fValueArea.href);
         if(fValueArea.target)
            tArea.attr('target', fValueArea.target);
         if(fValueArea.onclick)
            tArea.attr('onclick', fValueArea.onclick);
         tArea.attr('coords', jQuery.map(fValueArea.coords.split(','), function(fCoord) {
            return parseInt(parseInt(fCoord) * tMultiplier);
         }).join(','));

         fMap.map.append(tArea);
      });

      return true;
   };

   var tImageMapsFixAreas = function(fMaps) {
      var tMapsNotLoadedImages = [];
      jQuery.each(fMaps, function(fName, fValue) {
         if(!tImageMapFixAreas(fValue))
            tMapsNotLoadedImages.push(fValue);
      });

      if(tMapsNotLoadedImages.length > 0)
         setTimeout(function() { tImageMapsFixAreas(tMapsNotLoadedImages) }, 200);
   };

   jQuery(window).resize(function() { tImageMapsFixAreas(tMaps); });

   tImageMapsFixAreas(tMaps);
});

///#source 1 1 /Styles/mobile-frontend/js/app.socialsharing.js
(function () {
   function setupSocials(fRoot) {
      if (typeof twttr === 'undefined')
         return;
      if (twttr && twttr.widgets && twttr.widgets.load) {
         var tRoot = fRoot instanceof jQuery ? fRoot.get(0) : fRoot;
         try {
            twttr.widgets.load(tRoot);
         } catch (e) {
            if (console)
               console.log(e)
         }
      }
   }

   LkExtender.register(setupSocials);
})();
///#source 1 1 /Styles/mobile-frontend/js/app.geo-locations.js
(function () {
    var viewAllStatus;

    function markLocationIsUnavailable(fSet) {
        var tViewAllLink = fSet.find('.view-all').find('a').attr('href');
        fSet.find('.view-all').html(l10n.fill('geoLocation.disabledMessage').replace('{link}', tViewAllLink));
        return false;
    }

    function setHideShowTriggers(fTarget) {
       
        jQuery('.view-map', fTarget).click(function () {
            var tMap = jQuery(this).parents('li:first').find('.location-map');
            var tLabelHM = l10n.fill('geoLocation.linkHideMapLabel');
            var tLabelSM = l10n.fill('geoLocation.linkShowMapLabel');
            if (jQuery(this).html() == tLabelHM) {
                tMap.css('display', 'none');
                jQuery(this).html(tLabelSM);
            } else {
                tMap.css('display', 'block');
                jQuery(this).html(tLabelHM);
            }
            return false;
        });
       
    }

    function setupNearestLocations(fRoot) {
        jQuery('.geo-locations', fRoot).each(function () {
            if (jQuery(this).is('.geo-locations-loaded'))
                return;

            var tRelAttr = jQuery(this).attr('rel');
            if (!tRelAttr)
                return;
            var tRel = tRelAttr.split(':');
            if (tRel.length != 3)
                return;

            var tSetId = parseInt(tRel[0]);
            var tPageId = parseInt(tRel[1]);
            var tCount = parseInt(tRel[2]);
            if (tSetId < 1 || tCount < 1)
                return;

            var tDiv = jQuery(this).find('.nearest-locations');
            if (tDiv.length < 1) {
                tDiv = jQuery('<div class="nearest-locations"></div>');
                jQuery(this).prepend(tDiv);
            }
           
         //   tDiv.load(LkEnv.handlersRoot() + 'Handlers/GetLocations.ashx?id=' + tSetId + '&page_id=' + tPageId + '&lat=' + LkGeo.position.lat + '&lon=' + LkGeo.position.lon + '&count=' + tCount + '&lang=' + l10n.locale + ' .geo-locations ul', function () {
          //      setHideShowTriggers(tDiv);
          //  });

         
        /*    tDiv.load(LkEnv.handlersRoot() + 'Handlers/GetLocations.ashx?id=' + tSetId + '&page_id=' + tPageId + '&lat=' + LkGeo.position.lat + '&lon=' + LkGeo.position.lon + '&count=' + tCount + '&lang=' + l10n.locale + ' .locs-main', function () {
                setHideShowTriggers(tDiv);
             
                var viewAllStatusDIV = jQuery(this).find(".display-view-all");
                if (viewAllStatusDIV.length > 0) {
                    viewAllStatus = viewAllStatusDIV.attr('data-ref');
                    var tViewAllDiv = jQuery(this).parents(".geo-locations").find('.view-all');
                    if (viewAllStatus == "hide") { // hide view all link if there are no more locations!!
                        tViewAllDiv.hide();
                    }
                    else tViewAllDiv.show();
                }
            });*/
            
            $.ajax({ 'url': LkEnv.handlersRoot() + 'Handlers/GetLocations.ashx?id=' + tSetId + '&page_id=' + tPageId + '&lat=' + LkGeo.position.lat + '&lon=' + LkGeo.position.lon + '&count=' + tCount + '&lang=' + l10n.locale }).done(function (data) {
                var html = $(data);
                var dataStatus = html.find(".display-view-all").attr('data-ref');
                var preparedCode = $('.locs-main', html);
                tDiv.empty().append(preparedCode);

                setHideShowTriggers(tDiv);
                var viewAllStatusDIV = jQuery(tDiv).find(".display-view-all");
                if (viewAllStatusDIV.length > 0) {
                    viewAllStatus = viewAllStatusDIV.attr('data-ref');
                    var tViewAllDiv = jQuery(tDiv).parents(".geo-locations").find('.view-all');
                   if (viewAllStatus == "hide") { // hide view all link if there are no more locations!!
                      tViewAllDiv.hide();
                   } else {
                      tViewAllDiv.show();
                   }

                   if (dataStatus == "hide") {
                      tViewAllDiv.hide();
                   } else {
                      tViewAllDiv.show();
                   }
                }
            });
            
            var tViewAllA = jQuery(this).find('.view-all a');
            if (tViewAllA.length == 1)  
                tViewAllA.attr('href', tViewAllA.attr('href') + '&lat=' + LkGeo.position.lat + '&lon=' + LkGeo.position.lon);
           
        });
    }

    var tRoots = [];

    function coordinatesReceived(fR) {
        for (var tI = 0; tI < tRoots.length; tI++)
            if (!fR.available)
                jQuery('.geo-locations', tRoots[tI]).each(function () {
                    markLocationIsUnavailable(jQuery(this));
                });
            else
                setupNearestLocations(tRoots[tI]);
    }

    function loadGeolocations(fRoot) {
        var tGeolocations = jQuery('.geo-locations', fRoot);
        if (tGeolocations.length > 0) {
            tRoots.push(fRoot);
            LkGeo.loadCoordinates(coordinatesReceived);
            tGeolocations.each(function () { setHideShowTriggers(this); });
        }
    }

    LkExtender.register(loadGeolocations);
})();

///#source 1 1 /Styles/mobile-frontend/js/app.coupons.js
(function (jQuery) {
   function loadCoupons(fParent) {
      jQuery('.coupon-snippet-host', fParent).each(function () {
         var tThis = jQuery(this);
         var tPage = tThis.data('page');
         var tCoupon = tThis.data('coupon');
         if (!tPage || !tCoupon)
            return;
         var tLocked = false;
         var url = null;
         if (LkEnv.IsPreview()) {
            url = '/api/app/pages/GetCoupon/' + tPage + '?mode=' + LkEnv.Mode()+ '&';
         } else {
            url = LkEnv.handlersRoot() + 'Handlers/Coupon/Get.ashx?pageid=' + tPage+'&';
         }
         url += 'lang=' + l10n.locale + '&couponid=' + tCoupon;
         tThis.load(url + ' .content-mobile .block:first', {}, function (tData) {
            LkExtender.extend(tThis);
            tThis.find('.form.redeem-form')
                     .validatableForm(false)
                     .submit(function () {
                        if (!tLocked) {
                           var tForm = jQuery(this);
                           var tData = tForm.serialize();
                           tData += '&lat=' + LkGeo.position.lat;
                           tData += '&lon=' + LkGeo.position.lon;
                           tData += '&pageid=' + tPage;
                           if (tForm.validateForm()) {
                              tLocked = true;
                              jQuery.post(tForm.attr('action'), tData,
                                 function (fData) {
                                    tLocked = false;
                                    var tResult = jQuery(fData);
                                    if (tResult.is('.coupon-message.error')) {
                                       tForm.find('.messages-holder').empty().append(tResult).show();
                                    } else if (tResult.is('.coupon-message.success')) {
                                       tForm.parents('.coupon-redemtion-block:first').empty().append(tResult);
                                    }
                                 });
                           }
                        }
                        return false;
                     });

            var couponHtml = $('<html />').html(tData);
            var couponMobileCss = null;
            var couponMediumCss = null;
            couponHtml.find('style').each(function () {
               if (this.getAttribute('data-type') == 'mobile') {
                  couponMobileCss = this;
               }
               if (this.getAttribute('data-type') == 'medium') {
                  couponMediumCss = this;
               }
            });
            var getStyles = function (tStyleText, tResult) {
               if (tStyleText != null) {
                  $(tStyleText.innerHTML.split('\n')).each(function () {
                     var text = this.trim();
                     if (text != '' && text.indexOf('@media') != 0) {
                        var parts = text.split('{');
                        if (parts.length == 2) {
                           var selectorsText = parts[0];
                           var rules = parts[1].replace('}', '');
                           var selectors = selectorsText.split(',');
                           if (rules != '') {
                              tResult.push(
                              {
                                 Selectors: selectors,
                                 Rules: rules
                              });
                           }
                        }
                     }
                  });
               }
            };

            var couponMobileStyles = [];
            getStyles(couponMobileCss, couponMobileStyles);
            var couponMediumStyles = [];
            getStyles(couponMediumCss, couponMediumStyles);

            for (var tI = 0; tI < couponMobileStyles.length; tI++) {
               LkEnv.addMainCssRule(couponMobileStyles[tI].Selectors, couponMobileStyles[tI].Rules);
            }
            for (var tI = 0; tI < couponMediumStyles.length; tI++) {
               LkEnv.addMediumCssRule(couponMediumStyles[tI].Selectors, couponMediumStyles[tI].Rules);
            }
         });
      });
   };

   LkExtender.register(loadCoupons);
})(jQuery);

///#source 1 1 /Styles/mobile-frontend/js/app.shopping-cart.js
(function (jQuery) {
   function setupCart(fRoot) {
      fRoot.find('.shopping-cart-form').each(function() {
         var tThis = jQuery(this);
         tThis.find('.payment-add-to-cart').click(function() {
            var tButton = jQuery(this);
            var tForm = tButton.parents('form:first');
            if (tForm.validateForm()) {
               jQuery.ajax(LkEnv.handlersRoot() + 'Handlers/ShoppingCart/Register.ashx', {
                  data: tForm.serialize() + '&lang=' + l10n.locale,
                  type: "POST",
                  cache: false,
                  timeout: 20000,
                  beforeSend: function() {
                     tButton.css('width', tButton.outerWidth()).attr('disabled', 'disabled').addClass('sending-request');
                  },
                  success: function(fData, fStatus, fXHR) {
                     tButton.removeClass('sending-request');
                     if (fData && fData.success) {
                        tButton.addClass('request-successful');
                        setTimeout(function() {
                           tButton.removeAttr('disabled').removeClass('request-successful');
                        }, 2000);
                        checkForNotification();
                     } else {
                        tButton.removeAttr('disabled');
                        alert(fData && fData.messages && fData.messages.length ? fData.messages.join("\n") : l10n.fill("shoppingcart.serverError"));
                     }
                  },
                  error: function(fXHR, fStatus, fError) {
                     tButton.removeClass('sending-request').removeAttr('disabled');
                     alert(l10n.fill("shoppingcart.serverError"));
                  },
                  complete: function() {
                  }
               });
            }
            return false;
         });
      });
   }

   var tNotification = null;

   function calculateItems() {
      var tSC = LkEnv.cookies.get('sc');
      if(tSC && tSC.length > 10) {
         var tP = tSC.indexOf('[|]');
         if(tP >= 0) {
            var tC = 0;
            do {
               tP = tSC.indexOf('[|]', tP + 1);
               if(tP < 0)
                  tP = tSC.length;

               if((tSC[tP - 2] == ':' && tSC[tP - 1] == '0') || (tSC[tP - 3] == ':' && tSC[tP - 2] == '-' && tSC[tP - 1] == '2')) {
               } else {
                  tC++;
               }
               tP++;
            } while(tP < tSC.length);
            return tC;
         }
      }
      return 0;
   }

   function checkForNotification() {
      var tItemsCount = calculateItems();
      if(tItemsCount > 0) {
         if(tNotification == null) {
            tNotification = jQuery('<div class="shopping-cart-notification"><span><span></span></span></div>');
            jQuery('body').append(tNotification);         
            jQuery('.content-mobile').css({ 'padding-bottom': '50px' });
            if(!LkEnv.browser.supportPositionFixed){
                tNotification.addClass('fix-position-fixed');                     

               var tPreviousTop = 0;
               var tScrollHandler = function(){
                  var tScreen = window.screen;
                  if(!tScreen) return;
                  var tNewScrollTop = jQuery(document).scrollTop();
                  if(tPreviousTop != tNewScrollTop) {
                     var tHeight = Math.min(tScreen.availHeight, window.innerHeight, jQuery('body').get(0).clientHeight);
                     tNotification.css('top', tNewScrollTop + tHeight - tNotification.outerHeight());
                     tPreviousTop = tNewScrollTop;
                  }
               };
               jQuery(document).bind('scroll', tScrollHandler);
               jQuery(window).bind('scroll', tScrollHandler);
            }
            tNotification.click(showShoppingCart);
         }
         tNotification.removeClass('sc-hidden').find('span span').html(l10n.fill("shoppingcart.itemsInShoppingCart", tItemsCount));
         jQuery(document).scroll();
      } else {
         if(tNotification != null) {
            tNotification.addClass('sc-hidden');
         }
      }
   }

   function showShoppingCart() {
      var tCM = jQuery('.content-mobile');
      var tToHide = tCM.find('div:first');
      var tLayoutWrapper = jQuery('<div class="block shopping-cart-holder"></div>');
      var tLayoutHead = jQuery('<div class="block-head header"><div class="wrapper"><h2><span class="h-text"> </span></h2></div></div>');
      var tLayoutContent = jQuery('<div class="block-content clearfix"><div><form><div class="shopping-cart-content"><div class="shopping-cart-wrapper"></div></div></form></div></div>');
      var tButtonsHolder = jQuery('<div class="shopping-cart-buttons"><a href="#" class="close"></a><button type="button" class="payment-button payment-checkout"><span></span></button></div>');

      (function() {
         var tHeads = tCM.find(".block-head");
         if(!tHeads.hasClass('default-theme'))
            tLayoutHead.removeClass('default-theme');
      })();

      tLayoutWrapper.append(tLayoutHead).append(tLayoutContent);

      tToHide.hide();
      tNotification.addClass('sc-hidden');

      tLayoutHead.find('.h-text').html(l10n.fill("shoppingcart.checkout.header"));

      var tTable = jQuery("<table cellpadding='0' cellspacing='0' class='preloader'>" +
          "<thead><tr><th class='header-name'>&nbsp;</th><th class='header-qty'></th><th class='header-summary'></th></tr></thead>" +
          "<tbody><tr><td colspan='3'><span></span></td></tr></tbody>" +
          "<tfoot><tr><td>&nbsp;</td><td class='foot-total-lbl'></td><td class='foot-total'>0</td></tr></tfoot>" +
      "</table>");
      tTable.find('.header-qty').html(l10n.fill("shoppingcart.checkout.quantity"));
      tTable.find('.header-summary').html(l10n.fill("shoppingcart.checkout.summary"));
      tTable.find('.foot-total-lbl').html(l10n.fill("shoppingcart.checkout.total"));

      tButtonsHolder.find(".close").click(function() {
         tLayoutWrapper.remove();
         tToHide.show();
         checkForNotification();
         tLayoutWrapper = null;
         return false;
      }).text(l10n.fill("common.back"));

      tButtonsHolder.find(".payment-checkout").click(function() {
         var tButton = jQuery(this);
         var tForm = tButton.parents('form:first');
         if (gP) {
            jQuery.ajax(LkEnv.handlersRoot() + 'Handlers/ShoppingCart/Process.ashx', {
               data: tForm.serialize() + '&p=' + gP + '&lang=' + l10n.locale,
               type: "POST",
               cache: false,
               timeout: 20000,
               beforeSend: function() {
                  tButton.css('width', tButton.outerWidth()).attr('disabled', 'disabled').addClass('sending-request');
               },
               success: function(fData, fStatus, fXHR) {
                  if (fData && fData.success) {
                     window.location = fData.result.target
                  } else {
                     if (fData.messages && fData.messages.length)
                        alert(fData.messages.join("\n"));
                     tButton.removeAttr('disabled').removeClass('sending-request');
                  }
               },
               error: function(fXHR, fStatus, fError) {
                  tButton.removeAttr('disabled').removeClass('sending-request');
                  alert(l10n.fill("shoppingcart.serverError"));
               },
               complete: function() {

               }
            });
         }
      });

      tLayoutContent.find('.shopping-cart-content').append(tTable).append(tButtonsHolder);
      tCM.append(tLayoutWrapper);

      function updateCart(fEl) {
         var tForm = jQuery(fEl).parents('form:first');
         jQuery.ajax(LkEnv.handlersRoot() + 'Handlers/ShoppingCart/Update.ashx', {
            data: tForm.serialize(),
            type: "POST",
            cache: false,
            timeout: 20000,
            beforeSend: function () {
            },
            success: function (fData, fStatus, fXHR) {
            },
            error: function (fXHR, fStatus, fError) {
            },
            complete: function () {
            }
         });
      }

      jQuery.ajax(LkEnv.handlersRoot() + 'Handlers/ShoppingCart/GetCart.ashx', {
         data: 'lang=' + l10n.locale,
         type: "GET",
         cache: false,
         timeout: 20000,
         beforeSend: function () {

         },
         success: function (fData, fStatus, fXHR) {
            if(tLayoutWrapper == null)
               return;

            if(fData && fData.success) {
               if(fData.result && fData.result.items && fData.result.items.length) {
                  var tItems = fData.result.items;
                  var tBody = tTable.removeClass('preloader').find('tbody');
                  tBody.empty();
                  for(var tI in tItems) {
                     var tItem = tItems[tI];
                     if(!tItem.Hash)
                        continue;

                     var tRow = jQuery('<tr />');
                     var tName = jQuery('<td></td>').text(tItem.Product + (tItem.Option.length < 1 ? '' : ' (' + tItem.Option + ')'));
                     var tQty = jQuery('<td class="row-qty">&nbsp;</td>');
                     var tSummary = jQuery('<td class="row-summary">&nbsp;</td>').data('amount', tItem.Amount);
                     if(tItem.Quantity != '-1' && tItem.Quantity != '-2') {
                        tQty.empty().append(/* '<a href="#" data-step="-1" class="stepper">&ndash;</a>' */'<input type="text" />'/*'<a href="#" data-step="1" class="stepper">+</a>'*/);
                        tQty.find('input').attr('name', tItem.Hash).val(tItem.Quantity);
                     } else {
                        tQty.append('<a href="#" class="shopping-cart-checkbox"><input type="hidden" /></a>');
                        tQty.find('input').attr('name', tItem.Hash).val(2 + tItem.Quantity);
                        tQty.find('a').addClass(tItem.Quantity == '-2' ? 'not-checked' : '').click(function() { recalcSummary(jQuery(this).toggleClass('not-checked').find('input').val(jQuery(this).hasClass('not-checked') ? 0 : 1));updateCart(this); });
                     }
                     tRow.append(tName).append(tQty).append(tSummary);
                     tBody.append(tRow);
                  }

                  function recalcSummary(fInput) {
                     var tR = fInput.parents("tr:first");
                     var tSummary = tR.find('.row-summary');
                     if(fInput.hasClass('invalid')) {
                        tSummary.text('!!!').addClass('invalid');
                     } else {
                        var tA = (tSummary.data('amount') * fInput.val()).toFixed(2);
                        tSummary.data('summary', tA);
                        tSummary.removeClass('invalid').text(tA);
                     }
                     recalcTotal();
                  }

                  function recalcTotal() {
                     var tTotal = 0;
                     var tItems = tBody.find('.row-summary').each(function() {
                        if(jQuery(this).hasClass('invalid'))
                           return;

                        tTotal += parseFloat(jQuery(this).data('summary'));
                     });

                     tTable.find('.foot-total').text(tTotal.toFixed(2));
                  }

                  tBody.find("td.row-qty a.stepper").click(function() {
                     var tInput = jQuery(this).parents('td:first').find('input');
                     var tVal = parseInt(tInput.val()) + parseInt(jQuery(this).data('step'));
                     if(isNaN(tVal))
                        tVal = 1;
                     tInput.val(Math.max(tVal, 0));
                     tInput.removeClass('invalid');
                     recalcSummary(tInput);
                     return false;
                  });

                  tBody.find("td.row-qty input").bind('keyup', function() {
                     var tInput = jQuery(this);
                     var tRegex = /[0-9]+/gi;
                     if(tInput.val().match(tRegex) == null)
                        tInput.addClass('invalid');
                     else
                        tInput.removeClass('invalid');
                     recalcSummary(tInput);
                  }).change(function() { updateCart(this); }).each(function() { recalcSummary(jQuery(this)); });

               } else {
                  alert(l10n.fill("shoppingcart.checkout.shoppingCartEmpty"));
                  tButtonsHolder.find(".close").click();
               }
            } else {
               if(fData.messages && fData.messages.length)  {
                  alert(fData.messages.join("\n"));
                  tButtonsHolder.find(".close").click();
               }
            }
         },
         error: function (fXHR, fStatus, fError) {
            alert(l10n.fill("shoppingcart.serverError"));
         },
         complete: function () {

         }
      });

      return false;
   }

   jQuery(document).ready(function() {
      setTimeout(checkForNotification, 250);
   });

   LkExtender.register(setupCart);

})(jQuery);

///#source 1 1 /Styles/mobile-frontend/js/validation.js
function checkForm(number) {
   var res = true;
   var div_form_name = 'contactform' + number;
   var form_name = 'form' + number;
   var tFormBox = $('#' + div_form_name);

   var submitted = tFormBox.data('submitted');
   if (submitted) {
      return false;
   }

   if ($("#PrevSp").val() != '') {
      // spam
      res = false;
      return;
   }

   var tMessages = jQuery('<ul class="error" />');

   tFormBox.find('.text.valid').each(function () {
      if (this.value == '') {
         tMessages.append(jQuery('<li />').text(l10n.fill('form.textFieldRequiredMessage', this.title)));
         res = false;
      }
   });
   tFormBox.find('.bigtext.valid').each(function () {
      if (this.value == '') {
         tMessages.append(jQuery('<li />').text(l10n.fill('form.textFieldRequiredMessage', this.title)));
         res = false;
      }
   });
   tFormBox.find('.fileupload.valid').each(function () {
      if (this.value == '') {
         tMessages.append(jQuery('<li />').text(l10n.fill('form.textFieldRequiredMessage', this.title)));
         res = false;
      }
   });

   tFormBox.find('.checkbox.valid').each(function () {
      if (!this.checked) {
         tMessages.append(jQuery('<li />').text(l10n.fill('form.checkboxFieldRequiredMessage', this.title)));
         res = false;
      }
   });

   tFormBox.find('.phone').each(function () {
      if (!checkPhone(this.value, !jQuery(this).hasClass('valid'))) {
         tMessages.append(jQuery('<li />').text(l10n.fill('form.phoneInvalidFormatMessage', this.title)));
         res = false;
      }
   });

   tFormBox.find('.email').each(function () {
      if (!checkMail(this.value, !jQuery(this).hasClass('valid'))) {
          tMessages.append(jQuery('<li />').text(l10n.fill('form.emailInvalidFormatMessage', this.title)));
         res = false;
      }
   });

   tFormBox.find('.datepicker').each(function () {
       if ($(this).hasClass('valid')) {
           if (this.value == '') {
               tMessages.append(jQuery('<li />').text(l10n.fill('form.dateFieldRequiredMessage', this.title)));
               res = false;
           }
       }
   });

   tFormBox.find('.selectbox.valid').each(function () {
      if (this.value == "") {
         tMessages.append(jQuery('<li />').text(l10n.fill('form.selectBoxRequiredMessage', this.title)));
         res = false;
      }
   });

   var elements = tFormBox.find('.radiogroup.valid');
   var names = new Array;
   var flag = true;
   for (var i = 0; i < elements.length; i++) {
      flag = true;
      for (var j = 0; j < names.length; j++) {
         if (names[j] == elements[i].name) {
            flag = false;
         }
      }
      if (flag) {
         names.push(elements[i].name);
      }
   }
   for (var i = 0; i < names.length; i++) {
      elements = tFormBox.find('.radiogroup.valid[name="' + names[i] + '"]');
      flag = true;
      for (var j = 0; j < elements.length; j++) {
         if (elements[j].checked) {
            flag = false;
         }
      }
      if (flag && elements.length>0) {
         tMessages.append(jQuery('<li />').text(l10n.fill('form.radioGroupRequiredMessage', elements[0].title)));
         res = false;
      }
   }

   var captcha = tFormBox.find('.g-recaptcha');
   if (captcha.length > 0) {
      var response = grecaptcha.getResponse();
      if (response == null || response.length === 0) {
         var message = captcha.parent().get(0).title;
         tMessages.append(jQuery('<li />').text(message));
         res = false;
      }
   }

   tFormBox.find('ul.error').remove();
   if (!res) {
      tFormBox.find('div:first').prepend(tMessages);
      $.scrollTo(tMessages);
   } else {
      tFormBox.data('submitted', 1);
   }

   return res;
};

function checkMail(email, can_empty) {
   if (can_empty == true && email == "") {
      return true;
   }
   var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})$/;
   return filter.test(email);
};

function checkPhone(phone, can_empty) {
   if (can_empty == true && phone == "") {
      return true;
   }
   var filter = /^([0-9\+\(]{1})([0-9-\s\(\)])+$/;
   return filter.test(phone);
};

function checkForMobilePhone(phone, can_empty) {
   if (can_empty == true && phone == "") {
      return true;
   }
   phone = phone.split(" ").join("");
   phone = phone.split("-").join("");
   phone = phone.split("(").join("");
   phone = phone.split(")").join("");
   phone = phone.split("+").join("");
   var filter = /^[0-9]{10}$/;
   return filter.test(phone);
};

function checkDate(date) {
    return !isNaN(Date.parse(date));
}
///#source 1 1 /Styles/mobile-frontend/js/app.google-map.js
jQuery(document).ready(function () {
   //jQuery('.google-map').click(function () {
   //   var tIframe = jQuery('<iframe frameborder="0" scrolling="no" width="100%" height="' + jQuery('img', this).height() + 'px"></iframe>');
   //   tIframe.attr('src', this.href);
   //   jQuery(this).replaceWith(tIframe);
   //   return false;
   //});
});

///#source 1 1 /Styles/mobile-frontend/js/app.loyalty-program.js
(function () {
   function loadLoyaltyProgram(fParent) {
        var tRoot = jQuery('.loyalty-program', fParent);
        var tPageId = jQuery('.loyalty-program').attr('pageid');
        var tEligiablePicturePath = jQuery('.loyalty-program').attr('eligiablepicturepath');
        var tNotEligiablePicturePath = jQuery('.loyalty-program').attr('noteligiablepicturepath');
        var tCurrencySymbol = null;
        var tMemberId = null;
        var tIsEmployee = null;
        var tPreloader = tRoot.find('.preloader-wrapper');
        var tQ = LkEnv.getQueryString();

        if (tRoot.length) {
            if ('mode' in tQ && (tQ.mode == 'login-member' || tQ.mode == 'login-employee')) {
                navigate(tQ.mode);
            } else if (tQ.mode == 'registration-member') {
                openUpdateMemberForm("registration");
            } else {
                init();
            }
        }


        var fGeneralErrorHandler = function(fData) {
            if (fData.Command == 'go_to_login') {
                if (tIsEmployee == null || tIsEmployee == false) {
                    navigate('login-member');
                } else {
                    navigate('login-employee');
                }
            } else {
                if (fData.Messages && fData.Messages.length != 0) {
                    var alertMessage = "";
                    for (var i = 0; i < fData.Messages.length; i++) {
                        alertMessage += fData.Messages[i].Message;
                    }
                    alert(alertMessage);
                } else {
                    alert(l10n.fill('common.errorLoadingData'));
                }
            }
        };

        tRoot.find('.search-member form').find('input.submit').click(function() {
            var tForm = tRoot.find('.search-member form');
            if (tForm.validateForm()) {
                tPreloader.show();
                Service.request("app/loyalty/SearchByPhone?pageid={0}&phone={1}".format(tPageId, tForm.find('input[name=phone]').val()), {}, {},
                    function(fData) {
                        tMemberId = fData;
                        loadMemberHome();
                    },
                    function(fData) {
                        fGeneralErrorHandler(fData);
                    },
                    function(fData) {
                        tPreloader.hide();
                    });
            }
        });

        tRoot.find('.search-member form').find('input.phone').keypress(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                tRoot.find('.search-member form').find('input.submit').click();
            }
        });

       
      tRoot.find('.login-member form').find('input.submit').click(function () {
         var tForm = tRoot.find('.login-member form');
         if (tForm.validateForm()) {
             tPreloader.show();
            Service.request("app/loyalty/Login?pageid={0}".format(tPageId), JSON.stringify({ Phone: tForm.find('input[name=phone]').val() }), {},
               function (fData) {
                  tMemberId = fData;
                  tIsEmployee = false;
                  loadMemberHome();
               },
               function (fData) {
                  fGeneralErrorHandler(fData);
               },
               function (fData) {
                  tPreloader.hide();
               });
         }
      });

      tRoot.find('.login-member form').find('input.phone').keypress(function (event) {
          if (event.keyCode == 13) {
              event.preventDefault();
              tRoot.find('.login-member form').find('input.submit').click();
          }
      });

      tRoot.find('.login-employee form').find('input.submit').click(function () {
         var tForm = tRoot.find('.login-employee form');
         if (tForm.validateForm()) {
            tPreloader.show();
            Service.request("app/loyalty/Login?pageid={0}".format(tPageId), JSON.stringify(
                  {
                     Phone: tForm.find('input[name=phone]').val(),
                     Password: tForm.find('input[name=pass]').val()
                  }), {},
               function (fData) {
                  tMemberId = null;
                  tIsEmployee = true;
                  navigate(['search-member', 'changepassword', 'add-member']);
               },
               function (fData) {
                  fGeneralErrorHandler(fData);
               },
               function (fData) {
                  tPreloader.hide();
               });
         }
      });

      tRoot.find('.login-employee form').find('input.password').keypress(function (event) {
          if (event.keyCode == 13) {
              event.preventDefault();
              tRoot.find('.login-employee form').find('input.submit').click();
          }
      });

      var lblRecordVisit = l10n.fill('loyaltyProgram.recordVisitLabel');
      var tMemberInfoLoaded = false;
      var tActionsForMemberLoaded = false;
      var tMemberInfoLoadedSuccess = false;
      var tActionsForMemberLoadedSuccess = false;
      var tCurrentPointsBalance = null;
      var tExchangeRate = null;
      var tIsPunchBased = false;
      var tPunchPoints = 0;
      var tMaxAmountWithoutApproving = null;
      function loadMemberHome() {
         tMemberInfoLoaded = false;
         tActionsForMemberLoaded = false;
         tMemberInfoLoadedSuccess = false;
         tActionsForMemberLoadedSuccess = false;
         loadMemberInfo();
         loadActionsForMemberHome();
      }

      function loadMemberInfo() {
         tPreloader.show();
         Service.request("app/loyalty/GetMemberInfo?pageid={0}&businessuserid={1}".format(tPageId, tMemberId), {}, { type: 'GET' },
            function (fData) {
               if (fData) {
                  tRoot.find('.member-home .welcome-message').text('');
                  tRoot.find('.member-home .welcome-message').hide();
                  tRoot.find('.member-home .balance-message').text('');
                  tRoot.find('.member-home .balance-message').hide();
                  tRoot.find('.member-home .status-message').text('');
                  tRoot.find('.member-home .status-message').hide();
                  var fullName = "";
                  if (fData.FirstName != null && fData.FirstName != "") {
                     fullName += fData.FirstName;
                  }
                  if (fData.LastName != null && fData.LastName != "") {
                     if (fullName != "") {
                        fullName += " ";
                     }
                     fullName += fData.LastName;
                  }
                  if (fullName != "") {
                     tRoot.find('.member-home .welcome-message').text(l10n.fill('loyaltyProgram.welcomeMessageFormat').format(fullName));
                     tRoot.find('.member-home .welcome-message').show();
                  }

                  tCurrencySymbol = jQuery('<span/>').html(fData.CurrencySymbol).text();
                  tCurrentPointsBalance = fData.Points;
                  tMaxAmountWithoutApproving = fData.MaxAmountWithoutApproving;
                  tExchangeRate = fData.ExchangeRate;
                  tIsPunchBased = fData.IsPunchBased;
                  tPunchPoints = fData.PunchPoints;
                  var tMemberHome = tRoot.find('.member-home');
                  tMemberHome.find('.balance-message').text(tMemberHome.find('.balance-message').attr('message-format').format(tCurrentPointsBalance));
                  tMemberHome.find('.balance-message').show();
                  if (fData.ShowMemberStatus && fData.MemberStatusName) {
                     tMemberHome.find('.status-message').text(tMemberHome.find('.status-message').attr('message-format').format(fData.MemberStatusName));
                     tMemberHome.find('.status-message').show();
                  }
                  if (fData.RewardIsEligible) {
                     tMemberHome.find('.eligible_rewards').show();
                  } else {
                     tMemberHome.find('.eligible_rewards').hide();
                  }
                  if (tIsEmployee) {
                     tMemberHome.find('.enter_points').show();
                     tMemberHome.find('.go_to_search-member').show();
                     tMemberHome.find('.edit-member').show();
                  } else {
                     tMemberHome.find('.enter_points').hide();
                     tMemberHome.find('.go_to_search-member').hide();
                     tMemberHome.find('.edit-member').hide();
                  }

                  tMemberInfoLoadedSuccess = true;
                  if (tMemberInfoLoadedSuccess && tActionsForMemberLoadedSuccess) {
                     navigate('member-home');
                  }
               }
            },
            function (fData) {
               fGeneralErrorHandler(fData);
            },
            function (fData) {
               tMemberInfoLoaded = true;
               if (tMemberInfoLoaded && tActionsForMemberLoaded) {
                  tPreloader.hide();
               }
            });
      }

      function loadActionsForMemberHome() {
         var tMemberHome = tRoot.find('.member-home');
         var tActionsHost = tMemberHome.find('.actions');
         tActionsHost.empty();
         tPreloader.show();
         Service.request("app/loyalty/GetActions?pageid={0}".format(tPageId), {}, { type: 'GET' },
            function (fData) {
               if (fData) {
                  if (fData.length > 0) {
                     tMemberHome.find('.see-actions').show();
                  } else {
                     tMemberHome.find('.see-actions').hide();
                  }
                  for (var i = 0; i < fData.length; i++) {
                     var tAction = fData[i];
                     var tActionName = jQuery('<div class="action-name"/>').text(tAction.Name);
                     var tActionPoints = jQuery('<div class="action-points"/>').append(tActionsHost.attr('message-format').format(tAction.Points));
                     var tActionDescription = jQuery('<div class="action-description"/>').html(tAction.Description);
                     var tActionDiv = jQuery('<div class="action"/>').append(tActionName).append(tActionPoints).append(tActionDescription);
                     tActionsHost.append(tActionDiv);
                  }

                  tActionsForMemberLoadedSuccess = true;
                  if (tMemberInfoLoadedSuccess && tActionsForMemberLoadedSuccess) {
                     navigate('member-home');
                  }
               }
            },
            function (fData) {
               fGeneralErrorHandler(fData);
            },
            function (fData) {
               tActionsForMemberLoaded = true;
               if (tMemberInfoLoaded && tActionsForMemberLoaded) {
                  tPreloader.hide();
               }
            });
      }

      tRoot.find('.member-home .all_rewards a').click(function () {
         loadRewards();
         return false;
      });

      tRoot.find('.member-home .eligible_rewards a').click(function () {
         loadRewards();
         return false;
      });

      function loadRewards() {
         navigate('rewards-list');
         var tRewardsList = tRoot.find('.rewards-list');
         var tRewardsHost = tRewardsList.find('.rewards');
         tRewardsHost.empty();
         tPreloader.show();

         tRewardsList.find('input.invoice').val('');
         tRewardsList.find('.form').hide();
       
         Service.request("app/loyalty/GetRewards?pageid={0}&businessuserid={1}".format(tPageId, tMemberId), {}, { type: 'GET' },
         function (fData) {
            if (fData) {
               for (var i = 0; i < fData.length; i++) {
                  var tReward = fData[i];

                  var tRewardImage = jQuery('<div class="image-holder"><img src="" /></div>');
                  if (tReward.PictureUrl != null && tReward.PictureUrl != "") {
                     tRewardImage.find('img').attr('src', LkEnv.StorageUrl() + tReward.PictureUrl);
                  }

                  var tRewardBase = jQuery('<div class="text-wrapper" />');
                  var tRewardName = jQuery('<div class="reward-name" />').text(tReward.Name);

                  var tRewardPoints = jQuery('<div class="reward-points" />');
                  var tRewardPointsCount = jQuery('<span class="reward-points-count" />').text(l10n.fill('loyaltyProgram.rewardPointsFormat').format(tReward.Points));
                  tRewardPoints.append(tRewardPointsCount);
                  var tRewardIcon = jQuery('<span class="reward-icon"><img style="max-width: 32px" src="" /></span>');
                  if (tReward.IsEligible) {
                     tRewardIcon.find('img').attr('src', LkEnv.StorageUrl() + tEligiablePicturePath);
                  } else {
                     tRewardIcon.find('img').attr('src', LkEnv.StorageUrl() + tNotEligiablePicturePath);
                  }
                  tRewardPoints.append(tRewardIcon);
                  if (tReward.ShowRedeemButton) {
                     var tRewardRedeemButton = jQuery('<span class="loyalty-button-holder redeem-button"><input class="submit" type="button"></span>');
                     tRewardRedeemButton.find('input').val(l10n.fill('loyaltyProgram.redeemButtonText'));
                     tRewardRedeemButton.find('input').attr('reward-id', tReward.RewardID);
                     tRewardPoints.append(tRewardRedeemButton);

                     tRewardsList.find('.form').show();
                  }

                  var tRewardUsed = jQuery('<div class="reward-used" />');
                  var usedMessage;
                  if (tReward.Type == 1) {
                     var tMaxRewardUsedCount = tReward.AllowRedeemCountsForMember ? tReward.AllowRedeemCountsForMember : l10n.fill('loyaltyProgram.unlimitedLabel');
                     usedMessage = l10n.fill('loyaltyProgram.rewardUsedCountFormat').format(tReward.UsedByThisMember, tMaxRewardUsedCount);
                  }
                  else {
                     if (tReward.UsedByThisMember == 1) {
                        usedMessage = l10n.fill('loyaltyProgram.invoiceUsedLabel');
                     } else {
                        usedMessage = "";
                     }
                  }
                  var tRewardUsedCount = jQuery('<span class="reward-used-count" />').text(usedMessage);
                  tRewardUsed.append(tRewardUsedCount);
                  var tRewardDescription = jQuery('<div class="reward-description" />').html(tReward.Description);
                  tRewardBase = tRewardBase.append(tRewardName).append(tRewardPoints);
                  tRewardBase.append(tRewardUsed);
                  tRewardBase.append(tRewardDescription);
                  var tRewardDiv = null;
                  if (tReward.PictureUrl != null && tReward.PictureUrl != "") {
                     tRewardDiv = jQuery('<div class="reward-detail"/>').append(tRewardImage).append(tRewardBase);
                  } else {
                     tRewardDiv = jQuery('<div class="reward-detail"/>').append(tRewardBase);
                  }
                  var tRewardClear = jQuery('<div class="clear"/>');
                  tRewardsHost.append(tRewardDiv).append(tRewardClear);
               }
            }
         },
         function (fData) {
            fGeneralErrorHandler(fData);
         },
         function (fData) {
            tPreloader.hide();
         });
      }

      tRoot.find('.rewards-list .back-button a').click(function () {
         loadMemberHome();
      });

      tRoot.find('.rewards-list').on('click', '.redeem-button input', function () {
         if (confirm(l10n.fill('loyaltyProgram.areYouSureRedeemReward'))) {
            redeemReward(jQuery(this).attr('reward-id'));
         }
      });

      function redeemReward(fRewardId) {
         var tForm = tRoot.find('.rewards-list form');
         if (tForm.validateForm()) {
            var invoice = tRoot.find('.rewards-list input.invoice').val();

            Service.request("app/loyalty/Redeem?pageid={0}&businessuserid={1}".format(tPageId, tMemberId),
               JSON.stringify(
               {
                  RewardId: fRewardId,
                  Invoice: invoice
               }),
               {},
               function(fData) {
                  if (fData) {
                     alert(l10n.fill('loyaltyProgram.rewardRedeemed'));
                     loadRewards();
                  }
               },
               function(fData) {
                  fGeneralErrorHandler(fData);
               },
               function(fData) {
                  tPreloader.hide();
               });
         } else {
            var tStoreNumber;
            if (tRoot.find('.rewards-list .store-number-dropdown-wrapper').css('display') == 'none') {
               tStoreNumber = tRoot.find('.rewards-list input.store-number').val();
            } else {
               tStoreNumber = tRoot.find('.rewards-list select.store-number-dropdown').val();
            }
            if (!tStoreNumber) {
               var text = l10n.fill('form.textFieldRequiredMessage').format(l10n.fill('loyaltyProgram.storeNumberLabel'))
               if (text.endsWith(':')) {
                  text = text.substring(0, text.length - 1);
               }
               alert(text);
            }
         }
      }

      tRoot.find('.member-home .enter_points a').click(function () {
         tPreloader.show();
         loadPointsEntryType();
         loadActions();
         return false;
      });


       function loadPointsEntryType() {
            var tEnterPoint = tRoot.find('.enter-points');
            if (tIsPunchBased && tPunchPoints > 0) {
                tEnterPoint.find('.amount-entry').hide();
                tEnterPoint.find('.punch-entry').show();
                var tPunchLabelHost = tEnterPoint.find('.punch-points-label');
                tPunchLabelHost.text(lblRecordVisit + ' ' + l10n.fill('loyaltyProgram.actionPointsFormat').format(tPunchPoints));
            } else {
                tEnterPoint.find('.punch-entry').hide();
                tEnterPoint.find('.amount-entry').show();
            }
       }

      var tActions = null;
      var tStoreNumber = null;
      var tAmount = null;
      var tActionIds = null;
      var tIsPunch = false;
      function loadActions() {
         navigate('enter-points');
         var tEnterPoint = tRoot.find('.enter-points');
         var tActionsHost = tEnterPoint.find('.actions');
         tActionsHost.empty();
         tRoot.find('.enter-points input.amount').val('');
         tRoot.find('.enter-points input.store-number').val('');
         tRoot.find('.enter-points input.invoice').val('');
         tActions = null;
         tStoreNumber = null;
         tAmount = null;
         tActionIds = null;
         tIsPunch = false;
         tRoot.find('.enter-points .store-number-wrapper').hide();
         tRoot.find('.enter-points .store-number-dropdown-wrapper').hide();
       
         Service.request("app/loyalty/GetStores?pageid={0}".format(tPageId), {}, { type: 'GET' },
            function (fData) {

               tRoot.find('.enter-points form.async-validate').removeValidatableForm();
               var stores = fData;
               if (stores && stores.length > 0) {
                  var sStores = tRoot.find('.enter-points .store-number-dropdown-wrapper select');
                  sStores.empty();
                  sStores.append($("<option />").val(null).text(''));
                  $.each(stores, function () {
                     sStores.append($("<option />").val(this.StoreNumber).text(this.StoreNumber +' - ' +this.StoreName));
                  });

                  tRoot.find('.enter-points .store-number-wrapper').hide();
                  tRoot.find('.enter-points input.store-number').removeClass('validate-required');
                  tRoot.find('.enter-points .store-number-dropdown-wrapper').show();
                  tRoot.find('.enter-points select.store-number-dropdown').addClass('validate-required');
               } else {
                  tRoot.find('.enter-points .store-number-wrapper').show();
                  tRoot.find('.enter-points input.store-number').addClass('validate-required');
                  tRoot.find('.enter-points .store-number-dropdown-wrapper').hide();
                  tRoot.find('.enter-points select.store-number-dropdown').removeClass('validate-required');
               }
               tRoot.find('.enter-points input.store-number').removeClass('invalid');
               tRoot.find('.enter-points select.store-number-dropdown').removeClass('invalid');
               tRoot.find('.enter-points form.async-validate').validatableForm(true);

               Service.request("app/loyalty/GetActions?pageid={0}".format(tPageId), {}, { type: 'GET' },
                  function (fData) {
                     if (fData) {
                        tActions = fData;
                        tEnterPoint.find('.input-amount .symbol').text(tCurrencySymbol);
                        for (var i = 0; i < fData.length; i++) {
                           var tAction = fData[i];

                           var tActionLabel = jQuery('<label class="field-checkbox-label" />');
                           var tActionCheckBox = jQuery('<input type="checkbox" class="field-checkbox checkbox">');
                           tActionCheckBox.attr('name', tAction.ActionID);
                           var tActionName = jQuery('<span class="form-field-name" />');
                           tActionName.text(tAction.Name + ' ' + l10n.fill('loyaltyProgram.actionPointsFormat').format(tAction.Points));
                           tActionLabel.append(tActionCheckBox).append(tActionName);

                           tActionsHost.append(tActionLabel);
                        }
                     }
                  },
                  function (fData) {
                     fGeneralErrorHandler(fData);
                  },
                  function (fData) {
                     tPreloader.hide();
                  });
         },
         function (fData) {
            fGeneralErrorHandler(fData);
         },
         function (fData) {
         });
      }

      tRoot.find('.enter-points input.back').click(function () {
         loadMemberHome();
      });

      tRoot.find('.enter-points input.enter').click(function () {
         var tForm = tRoot.find('.enter-points form');
         if (tForm.validateForm() && tActions != null) {
            var ids = [];
            tRoot.find('.enter-points .actions input').each(function () {
               if ($(this).prop('checked')) {
                  ids.push($(this).prop('name'));
               }
            });
            var amout = tRoot.find('.enter-points input.amount').val();
            var punchEntry = tRoot.find('.enter-points .punch-entry-chbox').prop('checked');

            var storeNumber;
            if (tRoot.find('.enter-points .store-number-dropdown-wrapper').css('display') == 'none') {
               storeNumber = tRoot.find('.enter-points input.store-number').val();
            } else {
               storeNumber = tRoot.find('.enter-points select.store-number-dropdown').val();
            }
            var invoice = tRoot.find('.enter-points input.invoice').val();
            if (amout != '' || ids.length != 0 || punchEntry) {
               tActionIds = ids;
               tAmount = amout;
               tIsPunch = punchEntry;
               tStoreNumber = storeNumber;
               tInvoice = invoice;
               loadConfirmEnter();
            } else {
               alert(l10n.fill('loyaltyProgram.selectAtLeastOneOption'));
            }
         }
      });

      tRoot.find('.enter-points form').find('input.store-number').keypress(function (event) {
          if (event.keyCode == 13) {
              event.preventDefault();
              tRoot.find('.enter-points input.enter').click();
          }
      });

      function loadConfirmEnter() {
         navigate('enter-points-confirm');
         var tEnterPoint = tRoot.find('.enter-points-confirm');
         var tActionsHost = tEnterPoint.find('.actions');
         tActionsHost.empty();
         tEnterPoint.find('.amount').text('');

         tEnterPoint.find('.store-number').text(l10n.fill('loyaltyProgram.storeNumberLabel') + ' ' + tStoreNumber);
         tEnterPoint.find('.invoice').text(l10n.fill('loyaltyProgram.invoiceLabel') + ' ' + tInvoice);
         if (tAmount != "") {
            var tPoints = Math.floor(tExchangeRate * tAmount);
            var amountText = l10n.fill('loyaltyProgram.submitLabel') + ' ' + tCurrencySymbol + tAmount + ' ' + l10n.fill('loyaltyProgram.actionPointsFormat').format(tPoints) + '. ';
            if (tMaxAmountWithoutApproving < tAmount) {
               amountText += l10n.fill('loyaltyProgram.pendingTransactionNote');
            }
            tEnterPoint.find('.amount').text(amountText);
         } else if (tIsPunch) {
             tEnterPoint.find('.amount').text(lblRecordVisit + ' ' + l10n.fill('loyaltyProgram.actionPointsFormat').format(tPunchPoints));
          }

          for (var i = 0; i < tActions.length; i++) {
            for (var j = 0; j < tActionIds.length; j++) {
               if (tActions[i].ActionID == tActionIds[j]) {
                  var tActionLabel = jQuery('<label class="field-checkbox-label" />');
                  var tActionName = jQuery('<span class="form-field-name" />');
                  tActionName.text(l10n.fill('loyaltyProgram.submitLabel') + ' ' + tActions[i].Name + ' ' + l10n.fill('loyaltyProgram.actionPointsFormat').format(tActions[i].Points));
                  tActionLabel.append(tActionName);

                  tActionsHost.append(tActionLabel);
               }
            }
         }
      }

      tRoot.find('.enter-points-confirm input.back').click(function () {
         loadActions();
      });

      tRoot.find('.enter-points-confirm input.enter').click(function () {
         if (confirm(l10n.fill('loyaltyProgram.areYouSureEnterPoints'))) {
            var sActionIds = "";
            for (var i = 0; i < tActionIds.length; i++) {
               sActionIds += tActionIds[i];
               if (i != tActionIds.length - 1) {
                  sActionIds += ',';
               }
            }
            Service.request("app/loyalty/EnterPoints?pageid={0}&businessuserid={1}".format(tPageId, tMemberId), JSON.stringify(
               {
                  ActionIds: sActionIds,
                  Amount: tAmount == '' ? 0 : tAmount,
                  IsPunch: tIsPunch,
                  StoreNumber: tStoreNumber,
                  Invoice: tInvoice
               }), {},
            function (fData) {
               if (fData) {
                  if (tMaxAmountWithoutApproving < tAmount) {
                     alert(l10n.fill('loyaltyProgram.pointsSubmittedWithoutApproval'));
                  } else {
                     alert(l10n.fill('loyaltyProgram.pointsSubmitted'));
                  }
                  loadMemberHome();
               }
            },
            function (fData) {
               fGeneralErrorHandler(fData);
            },
            function (fData) {
               tPreloader.hide();
            });
         }
      });

    

      tRoot.find('.member-home .go_to_search-member a').click(function () {
         tMemberId = null;
         navigate(['search-member', 'changepassword', 'add-member']);
         return false;
      });

      function init() {
         tPreloader.show();
         Service.request("app/loyalty/Init?pageid={0}".format(tPageId), {}, { type: 'GET' },
            function (fData) {
               if (fData == null) {
                  tIsEmployee = true;
                  tMemberId = null;
                  navigate(['search-member', 'changepassword', 'add-member']);
               } else {
                  tIsEmployee = false;
                  tMemberId = fData;
                  loadMemberHome();
               }
            },
            function (fData) {
               fGeneralErrorHandler(fData);
            },
            function (fData) {
               tPreloader.hide();
            });
      };

      tRoot.find('.logout-wrapper a').click(function () {
         logOut();
         return false;
      });

      function logOut() {
         tPreloader.show();
         Service.request("app/loyalty/LogOut?pageid={0}".format(tPageId), {}, {},
            function (fData) {
               if (tIsEmployee == null || tIsEmployee == false) {
                  navigate('login-member');
               } else {
                  navigate('login-employee');
               }
            },
            function (fData) {
               fGeneralErrorHandler(fData);
            },
            function (fData) {
               tPreloader.hide();
            });
      };


      //fname : can be string or array of strings
      function navigate(fName) {
         tRoot.find('.pages > div').hide();
         var classList = $.isArray(fName) ? fName : new Array(fName);
         for (var i = 0; i < classList.length; i++) {
            var itemClass = classList[i];
            tRoot.find('.pages > div.' + itemClass).show();
            if (itemClass == 'login-member' || itemClass == 'login-employee' || itemClass == 'registration-member') {
               tRoot.find('.logout-wrapper').hide();
               tRoot.find('.logout-wrapper .employee-message').hide();
               if (itemClass == 'login-member') {
                   var tMemberForm = tRoot.find('.login-member form');
                   tMemberForm.find('input[name=phone]').val("");
               }
               if (itemClass == 'login-employee') {
                   var tEmployeeForm = tRoot.find('.login-employee form');
                   tEmployeeForm.find('input[name=phone]').val("");
                   tEmployeeForm.find('input[name=pass]').val("");
               }
            } else {
               tRoot.find('.logout-wrapper').show();
               if (tIsEmployee) {
                  tRoot.find('.logout-wrapper .employee-message').show();
               } else {
                  tRoot.find('.logout-wrapper .employee-message').hide();
               }
            }
         }
      }

      function forgotPasswordInit() {
         tRoot.find('.forgotLnk').click(function () {
            var phoneFld = tRoot.find('.login-employee [name="phone"]');
            var phone = phoneFld.val();
            if (phone != '') {
               $(phoneFld).removeClass('invalid');
               if (confirm(l10n.fill('loyaltyProgram.resetPasswordConfirmMessage'))) {
                  tPreloader.show();

                  Service.request("app/loyalty/ForgotPassword?pageid={0}&phone={1}".format(tPageId, phone), JSON.stringify({}), { timeout: 30000 },
                  function (fData) {
                     if (fData) {
                        alert(l10n.fill('loyaltyProgram.sentForgotPasswordMessage'));
                     }
                  },
                  function (fData) {
                     fGeneralErrorHandler(fData);
                  },
                  function (fData) {
                     tPreloader.hide();
                  });
               }
            } else {
               $(phoneFld).addClass('invalid');
            }



            return false;
         });
      }

      function changePasswordInit() {
         var changeContainer = tRoot.find('.changepassword');
         var form = $('form', changeContainer);
         form.find('input.submit').click(function () {
            var password = $('.password', form);
            var password2 = $('.password2', form);
            if (form.validateForm()) {
               tPreloader.show();
               Service.request("app/loyalty/ChangePassword?pageid={0}".format(tPageId), JSON.stringify(
           {
              Password: password.val(),
              Password2: password2.val()
           }), {},
                  function (fData) {
                     alert(l10n.fill('loyaltyProgram.successPasswordChangeMessage'));
                     password.val('');
                     password2.val('');
                     tRoot.find('.header', changeContainer).trigger('click');
                  },
                  function (fData) {
                     fGeneralErrorHandler(fData);
                  },
                  function (fData) {
                     tPreloader.hide();
                  });
            }
         });
      }

      function editAndAddMemberInit() {
         tRoot.find('.edit-member a').click(function () {
            tPreloader.show();
            Service.request("app/loyalty/GetMember?businessuserid={0}".format(tMemberId), {}, { type: 'GET' },
               function (fData) {
                  if (fData) {
                     openUpdateMemberForm("update");
                     var tForm = tRoot.find('.registration-member form');
                     tForm.find('input[name=firstname]').val(fData.FirstName);
                     tForm.find('input[name=lastname]').val(fData.LastName);
                     tForm.find('input[name=email]').val(fData.Email);
                     tForm.find('input[name=phone]').val(fData.Phone);
                     tForm.find('input[name=memberid]').val(fData.MemberID);
                     tForm.find('select[name=birthday_month]').val(fData.BirthdayMonth);
                     updateDaysList();
                     tForm.find('select[name=birthday_day]').val(fData.BirthdayDay);
                     tForm.find('select[name=birthday_year]').val(fData.BirthdayYear);
                     tForm.find('select[name=gender]').val(fData.Gender);
                     tForm.find('textarea[name=notes]').val(fData.Notes);
                  }
               },
               function (fData) {
                  fGeneralErrorHandler(fData);
               },
               function (fData) {
                  tPreloader.hide();
               });
            return false;
         });
         tRoot.find('.add-member a').click(function() {
            openUpdateMemberForm("update");
            return false;
         });
      }

      function openUpdateMemberForm(fMode) {
         var formDiv = tRoot.find('.registration-member');
         if (fMode == "registration") {
            formDiv.find('.loyalty-button-holder .back-button').hide();
            formDiv.find('textarea[name=notes]').parent().hide();
            formDiv.find('input.submit.registration').show();
            formDiv.find('input.submit.update').hide();
            formDiv.find('div.text-box.bottom-text').show();
         } else {
            formDiv.find('.loyalty-button-holder .back-button').show();
            formDiv.find('textarea[name=notes]').parent().show();
            formDiv.find('input.submit.registration').hide();
            formDiv.find('input.submit.update').show();
            formDiv.find('div.text-box.bottom-text').hide();
         }

         var tForm = tRoot.find('.registration-member form');
         tForm.find('input[name=firstname]').val('');
         tForm.find('input[name=lastname]').val('');
         tForm.find('input[name=email]').val('');
         tForm.find('input[name=phone]').val('');
         tForm.find('input[name=memberid]').val('');
         tForm.find('select[name=birthday_year]').val('');
         tForm.find('select[name=gender]').val('');
         tForm.find('select[name=birthday_month]').val('');
         tForm.find('select[name=birthday_day]').val('');
         tForm.find('textarea[name=notes]').val('');

         navigate('registration-member');
      }

      tRoot.find('.registration-member .back-button a').click(function () {
         if (tMemberId) {
            loadMemberHome();
         } else {
            navigate(['search-member', 'changepassword','add-member']);
         }
         return false;
      });

      var daysInMonth = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

      function updateDaysList() {
         var currentMonth = tRoot.find('.registration-member form').find('select[name=birthday_month]').val();
         if (currentMonth != '' && currentMonth != null) {
            var daysSelect = tRoot.find('.registration-member form').find('select[name=birthday_day]');
            daysSelect.find('option:gt(0)').remove();
            var newOptions = [];
            var i = 0;
            while (i < daysInMonth[currentMonth - 1]) {
               newOptions.push({ key: i + 1, value: i + 1 });
               i++;
            }

            jQuery.each(newOptions, function (index, item) {
               daysSelect.append($("<option></option>").attr("value", item.value).text(item.key));
            });
         }
      }

      tRoot.find('.registration-member form').find('select[name=birthday_month]').change(function (fEvent) {
         if (fEvent.originalEvent !== undefined) {
            updateDaysList();
         }
      });

      tRoot.find('.registration-member form').find('input.submit.registration').click(function () {
         var tForm = tRoot.find('.registration-member form');
         if (tForm.validateForm()) {
            tForm.find('ul.error').remove();
            tPreloader.show();
            Service.request("app/loyalty/Registration?pageid={0}".format(tPageId), JSON.stringify(
                  {
                     FirstName: tForm.find('input[name=firstname]').val(),
                     LastName: tForm.find('input[name=lastname]').val(),
                     Email: tForm.find('input[name=email]').val(),
                     Phone: tForm.find('input[name=phone]').val(),
                     MemberID: tForm.find('input[name=memberid]').val(),
                     BirthdayMonth: tForm.find('select[name=birthday_month]').val(),
                     BirthdayDay: tForm.find('select[name=birthday_day]').val(),
                     BirthdayYear: tForm.find('select[name=birthday_year]').val(),
                     Gender: tForm.find('select[name=gender]').val(),
                  }), { timeout: 30000 },
               function (fData) {
                  tMemberId = fData;
                  tIsEmployee = false;
                  loadMemberHome();
               },
               function (fData) {
                  if (fData.Messages) {
                     var tUl = jQuery('<ul class="error"/>');
                     for (var i = 0; i < fData.Messages.length; i++) {
                        var tLi = jQuery('<li/>').append(fData.Messages[i].Message);
                        tUl.append(tLi);
                     }
                     tForm.prepend(tUl);

                  } else {
                     alert(l10n.fill('common.errorLoadingData'));
                  }
               },
               function (fData) {
                  tPreloader.hide();
               });
         }
      });

      tRoot.find('.registration-member form').find('input.submit.update').click(function () {
         var tForm = tRoot.find('.registration-member form');
         if (tForm.validateForm()) {
            tForm.find('ul.error').remove();
            tPreloader.show();
            var url = "app/loyalty/UpdateMember?pageid={0}".format(tPageId);
            if (tMemberId) {
               url += "&businessuserid={0}".format(tMemberId);
            }
            Service.request(url, JSON.stringify(
                  {
                     FirstName: tForm.find('input[name=firstname]').val(),
                     LastName: tForm.find('input[name=lastname]').val(),
                     Email: tForm.find('input[name=email]').val(),
                     Phone: tForm.find('input[name=phone]').val(),
                     MemberID: tForm.find('input[name=memberid]').val(),
                     BirthdayMonth: tForm.find('select[name=birthday_month]').val(),
                     BirthdayDay: tForm.find('select[name=birthday_day]').val(),
                     BirthdayYear: tForm.find('select[name=birthday_year]').val(),
                     Gender: tForm.find('select[name=gender]').val(),
                     Notes: tForm.find('textarea[name=notes]').val(),
                  }), {},
               function (fData) {
                  tMemberId = fData;
                  loadMemberHome();
               },
               function (fData) {
                  if (fData.Messages) {
                     var tUl = jQuery('<ul class="error"/>');
                     for (var i = 0; i < fData.Messages.length; i++) {
                        var tLi = jQuery('<li/>').append(fData.Messages[i].Message);
                        tUl.append(tLi);
                     }
                     tForm.prepend(tUl);

                  } else {
                     alert(l10n.fill('common.errorLoadingData'));
                  }
               },
               function (fData) {
                  tPreloader.hide();
               });
         }
      });

      changePasswordInit();
      forgotPasswordInit();
      editAndAddMemberInit();
    };

    LkExtender.register(loadLoyaltyProgram);
})();

///#source 1 1 /Styles/mobile-frontend/js/app.mobile-directory.js
(function () {
   function loadMobileDirectory(fParent) {
      if (jQuery('.mobile-directory-holder', fParent).length > 0) {

         function getStaticMapSrc(fLatitude, fLongitude, fWidth, fHeight, fZoom) {
            return '//maps.mobilebuilder.net/staticmap.php?center=' + fLatitude + ',' + +fLongitude + '&zoom=' + fZoom + '&size=' + fWidth + 'x' + +fHeight + '&markers=' + fLatitude + ',' + +fLongitude + ',ltblu-pushpin';
         }

         function gpsUnavailable() {
            setupDirectories(LkGeo.position);
         }
         
         var tTimeOut = setTimeout(gpsUnavailable, 20000);

         function tmpCombineUri(fPage) {
            var tResult = fPage.DomainExt ? fPage.DomainExt : fPage.Domain;
            if (tResult)
               tResult = "http://" + tResult + (fPage.URI || '/');
            return tResult || '#';
         }

         function tmpPositionCacheAndGo(fLink) {
            LkGeo.cachePositionFor(LkEnv.getDomain(fLink), LkGeo.position.lat, LkGeo.position.lon);
            setTimeout(function () { window.location = fLink }, 300);
         }

         function tmpLinkClickHandler(fE) {
            fE.preventDefault();
            tmpPositionCacheAndGo(this.href);
         }

         var tMobileHolders = jQuery('.mobile-directory-holder');
         var tMobileForms = tMobileHolders.find('.mobile-directory-form');
         tMobileForms.find('.location-form').submit(function (fE) {
            fE.preventDefault();
            var tThis = jQuery(this);
            LkGeo.positionByZip(jQuery(this).find('input[name=zip]').val(), jQuery(this).find('input[name=country]').val(), function (fData) {
               if (fData && fData.success && fData.result) {
                  var tZip = fData.result;
                  LkGeo.setPosition(tZip.Latitude, tZip.Longitude);
                  var tGeo = { available: true, ready: true, position: { lat: tZip.Latitude, lon: tZip.Longitude } };
                  var tMobileForm = jQuery(tThis).parents('.mobile-directory-form:first');
                  if (tMobileForm.is('.unknown-location'))
                     setupDirectories(tGeo);
                  else {
                     setupPosition(tMobileForm, tGeo);
                     tMobileForm.removeClass('change-location');
                  }
               } else {
                  alert(l10n.fill('mobileDirectory.UnknownZIPMessage'));
               }
            });
         }).find('.cancel').click(function (fE) {
            fE.preventDefault();
            jQuery(this).parents('.mobile-directory-form:first').removeClass('change-location');
         });
         tMobileForms.find('.location').find('input.change,a.change').click(function () {
            jQuery(this).parents('.mobile-directory-form:first').addClass('change-location');
         });
         tMobileForms.find('.location').find('input.refresh').click(function () {
            var tMobileForm = jQuery(this).parents('.mobile-directory-form:first');
            var tPreloader = tMobileForm.find('.preloader-wrapper');
            tPreloader.show();
            var tTOut = setTimeout(function () {
               clearTimeout(tTOut);
               tPreloader.hide();
               alert(l10n.fill('mobileDirectory.positioningServiceUnAvailable'))
            }, 20000);
            LkGeo.loadCoordinates(function (fGeo) {
               clearTimeout(tTOut);
               tPreloader.hide();
               setupPosition(tMobileForm, fGeo, true);
            }, true);
         });
         tMobileForms.find('.search-form-holder').each(function () {
            var tThis = jQuery(this);
            var tHolder = tThis.parents('.mobile-directory-holder:first');
            var tPreloader = tThis.parents('.mobile-directory-form:first').find('.preloader-wrapper');
            tThis.find('form').submit(function (fE) {
               fE.preventDefault();
               var tInput = jQuery(this).find('input[name=s]');
               var tCategories = jQuery(this).find('input[name=categories]');
               if (tInput.val().trim().length < 1 && tCategories.val().trim().length < 1) {
                  tInput.addClass('error');
                  return;
               }
               tInput.removeClass('error');
               tPreloader.show();
               var tDirectorySearchMode = tHolder.find('input[name=fType]').val();

               var tMode = 'businesses';
               if (tDirectorySearchMode != 's') // simple
                  tMode = tHolder.data('mode');

               var tData = jQuery(this).serialize() + '&lang=' + l10n.locale;
               if (tCategories.val().length > 0) {
                  var categoryRadius = tHolder.data('category-search-radius');
                  if (categoryRadius) {
                     if (tData.indexOf('&r=') > -1) {
                        tData = tData.replace('&r=', '&r=' + categoryRadius);
                     } else {
                        tData += '&r=' + categoryRadius;
                     }
                  } else {
                     tData = tData.replace('&r=', '&');
                  }
               }
               jQuery.ajax(LkEnv.handlersRoot() + 'Handlers/MobileDirectory/' + (tMode == 'deals' ? 'Deals.ashx' : 'Businesses.ashx'), {
                  data: tData,
                  cache: false,
                  timeout: 20000,
                  beforeSend: function () {
                     tToHide.hide();
                  },
                  success: function (fData, fStatus, fXHR) {
                     if (tMode == 'deals')
                        showOutputDeals(tHolder, tInput.val().trim(), fData);
                     else
                        showOutputBusinesses(tHolder, tInput.val().trim(), fData);
                     tHolder.trigger('status-changed', ['result', tMode]);
                  },
                  error: function (fXHR, fStatus, fError) {
                     alert(l10n.fill('mobileDirectory.errorLoadingData'));
                     tToHide.show();
                  },
                  complete: function () {
                     tPreloader.hide();
                  }
               });
            });
         });

         function setupPosition(fMobileForm, fGeo, fAlert) {
            var tLocation = fMobileForm.find('.location');
            tLocation.find('.coords').find('span').html(fGeo.position.lat + ' &ndash; ' + fGeo.position.lon);
            tLocation.find('.image').find('img').attr('src', getStaticMapSrc(fGeo.position.lat, fGeo.position.lon, 290, 193, 14));
            fMobileForm.find('input[name=lat]').val(fGeo.position.lat);
            fMobileForm.find('input[name=lon]').val(fGeo.position.lon);
            if (fAlert && fGeo.redirect) {

            } else if (fAlert && !fGeo.available) {
               alert(l10n.fill('mobileDirectory.positioningServiceUnAvailable'));
            }
         }


         function setupDirectories(fGeo) {
            clearTimeout(tTimeOut);
            jQuery('.mobile-directory-holder').each(function () {
               var tHolder = jQuery(this);
               tHolder.removeClass('init');
               var tMobileForm = tHolder.find('.mobile-directory-form');
               var tDirectorySearchMode = tMobileForm.find('input[name=fType]').val();
               if (tDirectorySearchMode == 's' && !fGeo.available) {
                  //tMobileForm.find('.search-form-holder').hide();
               }

               if (fGeo.redirect) {
                  tMobileForm.addClass('change-location');
               } else if (!fGeo.available) {
                  tMobileForm.addClass('unknown-location change-location');
               } else {
                  tMobileForm.removeClass('unknown-location change-location');
                  tMobileForm.find('.tabs').find('li').click(function () {
                     var tThis = jQuery(this);
                     tThis.parents('ul:first').find('li').removeClass('selected');
                     tThis.addClass('selected');
                     if (tThis.is('.tab-deals')) {
                        tHolder.data('mode', 'deals');
                     } else {
                        tHolder.data('mode', 'businesses');
                     }
                  });
                  var tFormBlock = tMobileForm.parents('.block-content:first').parents('.block-content:first').find('.mobile-directory-subscription-form');
                  var tCancel = jQuery("<a href='#' class='cancel' />").text(l10n.fill('mobileDirectory.changeLocationCancelLabel')).click(function (fE) {
                     fE.preventDefault();
                     tFormBlock.hide();
                     tMobileForm.find('.see-all').show();
                  });
                  tFormBlock.find('form').find('input[type=submit]').parents(":first").prepend(tCancel);
                  tMobileForm.find('.see-all').click(function (fE) {
                     fE.preventDefault();
                     var tForm = tFormBlock.show();
                     tForm.find('input[name=Search]').val(tMobileForm.find('.search-form-holder').find('input[name=s]').val());
                     jQuery(this).hide();
                  });
                  setupPosition(tMobileForm, fGeo);
                  tHolder.trigger('status-changed', ['form', tHolder.data('mode')]);
               }
            });
         }

         var tToHide = null;
         (function () {
            var tImageFirst = true;
            tToHide = jQuery('.content-mobile .block').filter(function () {
               var tThis = jQuery(this);
               if (tImageFirst && tThis.find('.image-snippet').length) {
                  tImageFirst = false;
                  return false;
               }
               return !tThis.hasClass('mobile-directory-subscription-form') && !tThis.find('.banner-box').length && !tThis.find('.multi-point-map').length && !tThis.find('.mobile-directory-holder').length
            });
            var tImageFirst2 = true;
            var tToHideRows =jQuery('#root > .row-outer').filter(function () {
               var tThis = jQuery(this);
               var toRerurn = true;
               var blocks = tThis.find('> .row-inner > .container > .container-content > .block');
               blocks.each(function () {
                  var tBlock = jQuery(this);
                  if (tImageFirst2 && tBlock.find('.image-snippet').length) {
                     tImageFirst2 = false;
                     toRerurn = false;
                  }

                  if (toRerurn) {
                     toRerurn = !tBlock.hasClass('mobile-directory-subscription-form') && !tBlock.find('.banner-box').length && !tBlock.find('.multi-point-map').length && !tBlock.find('.mobile-directory-holder').length;
                  }
               });
               return toRerurn;
            });

            tToHide = tToHide.add(tToHideRows);
         })();

         var tQ = LkEnv.getQueryString();
         var tSF = tMobileForms.find('.search-form-holder').find('form');
         var tMode = 'mode' in tQ && tQ.mode == 'businesses' ? 'businesses' : 'deals';
         if ('s' in tQ && 'lat' in tQ && 'lon' in tQ && tQ.lat.match(/[0-9]+(\.[0-9]+)?/i) && tQ.lon.match(/[0-9]+(\.[0-9]+)?/i)) {
            setupDirectories({ available: true, ready: true, position: { lat: tQ.lat, lon: tQ.lon } });
            tSF.find('input[name=s]').val(tQ.s);
            tMobileHolders.data('mode', tMode);
            if (tMode == 'businesses')
               tMobileHolders.each(function () { jQuery(this).find('.tabs').find() });
            if ('categories' in tQ)
               tSF.find('input[name=categories]').val(tQ.categories);
            tSF.submit();
            tSF.find('input[name=categories]').val('');
         } else {
            LkGeo.loadCoordinates(function (fGeo) {
               setupDirectories(fGeo);
               if ('categories' in tQ) {
                  tSF.find('input[name=categories]').val(tQ.categories);
                  tSF.parents('.mobile-directory-holder:first').data('mode', tMode);
                  var tMax = 0;
                  tSF.find('select[name=r]').find('option').each(function () { if (tMax < parseInt(this.val)) tMax = parseInt(this.val); }).end().val(tMax);
                  tSF.submit();
                  tSF.find('input[name=categories]').val('');
               }
            });
         }


         function convertDealToOLMap(tItem) {
            var olmLoc = {};
            if (tItem) {

               var tItemLocation = tItem.Locations.Items[0];
               olmLoc.lat = tItemLocation.Latitude;
               olmLoc.lon = tItemLocation.Longitude;
               olmLoc.name = tItem.Company;
               olmLoc.description = tItem.BusinessDescription;
               olmLoc.linkText = tItem.Company;
               olmLoc.linkUrl = tmpCombineUri(tItem.CompanyPage);
               olmLoc.phone = tItemLocation.PhoneLinkFull;
               var tAddr = "";
               if (tItemLocation.Address.Address.trim().length > 0)
                  tAddr += tItemLocation.Address.Address;

               if (tItemLocation.Address.City.trim().length > 0)
                  tAddr += (" " + tItemLocation.Address.City);
               olmLoc.address = tAddr;
               if (olmLoc.MapIconExternalURL) {
                  olmLoc.markerImage = {};
                  olmLoc.markerImage.src = olmLoc.MapIconExternalURL;
               }
               return olmLoc;
            }
         }

         function convertBusinessToOLMap(tItem) {
            var olmLoc = {};
            if (tItem) {
               console.log(tItem);
               olmLoc.lat = tItem.Latitude;
               olmLoc.lon = tItem.Longitude;
               olmLoc.name = tItem.Company;
               olmLoc.description = tItem.BusinessDescription;
               olmLoc.linkText = tItem.Company;
               olmLoc.linkUrl = tmpCombineUri(tItem.CompanyPage);
               olmLoc.phone = tItem.PhoneLinkFull;
               var tAddr = "";
               if (tItem.Address.Address.trim().length > 0)
                  tAddr += tItem.Address.Address;

               if (tItem.Address.City.trim().length > 0)
                  tAddr += (" " + tItem.Address.City);
               olmLoc.address = tAddr;
               if (tItem.MapIconExternalURL) {
                  olmLoc.markerImage = {};
                  olmLoc.markerImage.src = tItem.MapIconExternalURL;
               }
               return olmLoc;
            }
         }


         function showOutputDeals(fHolder, fS, fData) {
            fHolder.addClass('show-result');
            var pageid = fHolder.attr('pageid');
            var domainid = fHolder.attr('domainid');
            var tMobileResult = fHolder.find('.mobile-directory-result');
            var tMapMultiPoints = fHolder.find('.multi-point-map');
            tMobileResult.empty();

            var tSearchString = fS;
            var olmData = {};
            if (fData.olmData)
               olmData = fData.olmData;

            var tMessage = jQuery('<div class="message" />');
            var tUl = jQuery('<ul />');
            if (fData && jQuery.isArray(fData.result) && fData.result.length > 0) {
               olmData.locations = [];

               if (fData.categories && jQuery.isArray(fData.categories)) {
                  //   tMessage.text(l10n.fill('mobileDirectory.businessesNewFoundMessage'));
                  tMessage.html(l10n.fill('mobileDirectory.dealsFoundMessage'));
                  tSearchString = jQuery.map(fData.categories, function (a) { return a.Name }).join(', ');
               } else
                  tMessage.html(l10n.fill('mobileDirectory.dealsFoundMessage'));
               for (var tI in fData.result) {
                  var tItem = fData.result[tI];
                  var tItemLocation = tItem.Locations.Items[0];

                  var tLi = jQuery('<li />');
                  var tTopDiv = jQuery('<div />');
                  if (tItem.LogoImageUrl) {
                     var tLogImg = jQuery('<img class="logo" />').attr('src', LkEnv.StorageUrl() + tItem.LogoImageUrl);
                     var tWrapper = jQuery('<div class="logo-wrapper"/>').append(tLogImg);
                     var tTopLeftDiv = jQuery('<div class="left-section"/>').append(tWrapper);
                     tTopDiv.append(tTopLeftDiv);
                     tTopDiv.attr('class', 'two-section');
                  }
                  var tTopRightDiv = jQuery('<div class="right-section"/>');
                  tTopDiv.append(tTopRightDiv);
                  tLi.append(tTopDiv);
                  var tTmp = jQuery('<a />').attr('class', 'base-link').attr('href', tmpCombineUri(tItem.CompanyPage)).text(tItem.Company || '').click(tmpLinkClickHandler);
                  tTmp = jQuery('<h3 />').append(tTmp);
                  if (tItemLocation.Distance) {
                     var distanceMessage = l10n.fill('mobileDirectory.headerCompanyDistancePostfix', tItemLocation.Distance.toFixed(1));
                     if (jQuery('.mobile-directory-holder:first form').find('input[name=lat]').val() == "" &&
                        jQuery('.mobile-directory-holder:first form').find('input[name=lon]').val() == "") {
                        distanceMessage = " (Distance to the location is not defined. GPS is not enabled or not allowed on your phone)";
                     }
                     tTmp.append(distanceMessage);
                  }
                  tTopRightDiv.append(tTmp);

                  jQuery('<p />').text(tItem.BusinessDescription || '').appendTo(tTopRightDiv);

                  var tCoupon = jQuery('<div class="coupon" />');
                  jQuery('<a class="clip-it block-link"/>').attr('href', tmpCombineUri(tItemLocation.Page)).click(tmpLinkClickHandler).appendTo(tCoupon);
                  jQuery('<h4 />').text(tItem.Name || '').appendTo(tCoupon);

                  if (tItem.Valid) {
                     tTmp = jQuery('<span />').text(l10n.fill('mobileDirectory.validThoughMessage',tItem.Valid));
                     tCoupon.append(tTmp);
                  }
                  
                  var tLocation = jQuery('<div class="location" />');

                  var tCoords = jQuery('<div class="coords" />');
                  var tInnerCoords = jQuery('<div/>');
                  tCoords.append(tInnerCoords);
                  //tTmp = jQuery('<strong />').text(tItem.Company || '');
                  //tCoords.append(tTmp).append('<br />');
                  if (tItemLocation.Address.Address.trim().length > 0)
                     jQuery('<span />').appendTo(tInnerCoords).text(tItemLocation.Address.Address || '');

                  if (tItemLocation.Address.City.trim().length > 0)
                     jQuery('<span />').appendTo(tInnerCoords).text(' ' + tItemLocation.Address.City);

                  if (tItemLocation.Address.State.trim().length > 0)
                     jQuery('<span />').appendTo(tInnerCoords).text(' ' + tItemLocation.Address.State);

                  if (tItemLocation.Address.Zip.trim().length > 0)
                     jQuery('<span />').appendTo(tInnerCoords).text(', ' + tItemLocation.Address.Zip);

                  if (tItemLocation.Phone.trim().length > 0) {
                     var tPhone = tItemLocation.Phone.trim().split(/[^0-9+]/).join('');
                     tTmp = jQuery('<a />').attr('class', 'base-link').attr('href', 'tel:' + tPhone).attr('onclick', 'clickPhone(' + pageid + ',' + domainid + ',' + tItemLocation.LocationItemID + ')')
                        .text(l10n.fill('mobileDirectory.callButtonPrefix', LkEnv.formatter.phone(tPhone)));
                     tItem.PhoneLinkFull = "<a href='tel:" + tPhone + "' onclick='clickPhone(" + pageid + ',' + domainid + ',' + tItemLocation.LocationItemID + ")'>Call: " + tPhone + "</a>";

                     var tPhoneDiv = jQuery('<div class="phone" />');
                     tPhoneDiv.append(tTmp);
                     tLocation.append(tPhoneDiv);
                  }

                  var tCustomFieldsDiv = jQuery('<div class="custom-fields" />');
                  var tCusomImagesUl = generateCustomImages(tItemLocation.CustomFields);
                  tCustomFieldsDiv.append(tCusomImagesUl);
                  tLocation.append(tCustomFieldsDiv);

                  var tImageDiv = jQuery('<div class="image"/>');
                  var tImage = jQuery('<a class="block-link"><img src="" /></a>');
                  if (fHolder.data('display-map-in-result') == 'False') {
                     tImageDiv.append(jQuery('<span class="view-map"><a class="base-link" href="#">View Map</a></span>'));
                     tImage.css('display', 'none');
                  }
                  tImageDiv.append(tImage);
                  if (fHolder.data('display-map-in-result') == 'False') {
                     tImageDiv.append(jQuery('<span style="display: none;" class="hide-map"><a class="base-link" href="#">Hide Map</a></span>'));
                  }
                  tImage.find('img').attr('src', getStaticMapSrc(tItemLocation.Latitude, tItemLocation.Longitude, 870, 400, 14));
                  var redirectUrl = 'http://maps.google.com/?q=' + tItemLocation.Latitude + ',' + tItemLocation.Longitude;
                  var href = '';
                  if (getStatisticLink) {
                     href = getStatisticLink('map', pageid, domainid, tItemLocation.LocationItemID, redirectUrl);
                     tImage.attr('href', href);
                     tImage.attr('target', '_blank');
                  }

                  tLocation = tLocation.append('<div class="clear"/>').append(tCoords).append(tImageDiv);

                  tLi.append('<div class="clear"/>');
                  tLi.append(tCoupon);
                  tLi.append(tLocation);

                  tUl.append(tLi);

                  var olmLocation = convertDealToOLMap(tItem);
                  olmData.locations.push(olmLocation);
               }
               tMobileResult.append(tUl);
               if (olmData.locations.length > 0 && tMapMultiPoints.length > 0) {
                  // set up the multi-point map
                  buildOLMapDirectory(olmData); // this func is inside MapMultiplePointsSnippet.cshtml

               }
            } else {
               if (fData.categories && jQuery.isArray(fData.categories))
                  tMessage.text(l10n.fill('mobileDirectory.dealsNotFoundMessage'));
               else
                  tMessage.html(l10n.fill('mobileDirectory.dealsNotFoundMessageWithSubject'));
               $('.multi-point-map').hide();
            }
            tMessage.find('strong').text(tSearchString);
            tMobileResult.prepend(tMessage);

            tMobileResult.append('<div class="divider" />');
            //tMobileResult.append('<a href="#" class="see-all">See all deals that matched your search</a>');

            var tButton = jQuery('<input type="button" class="back-to-search" />').val(l10n.fill('mobileDirectory.backToSearchButtonLabel')).click(function () {
               var tHolder = jQuery(this).parents('.mobile-directory-holder:first');
               var tBackButtonLink = tHolder.find('input[name=bType]').val();
               if (tBackButtonLink == 's') {
                  var tQ = LkEnv.getQueryString();
                  if ('categories' in tQ) {
                     window.location.href = window.location.href.substring(0, window.location.href.indexOf('?'));
                  } else {
                     $('.multi-point-map').hide();
                     fHolder.removeClass('show-result');
                     tToHide.show();
                     fHolder.trigger('status-changed', ['form', fHolder.data('mode')]);
                  }
               } else window.location.href = "/";
            });
            tMobileResult.append(tButton);
         }

         function showOutputBusinesses(fHolder, fS, fData) {
            fHolder.addClass('show-result');
            var pageid = fHolder.attr('pageid');
            var domainid = fHolder.attr('domainid');
            var tMobileResult = fHolder.find('.mobile-directory-result');
            var tMapMultiPoints = jQuery('.multi-point-map');
            tMobileResult.empty();

            var tSearchString = fS;
            var olmData = {};
            if (fData.olmData)
               olmData = fData.olmData;

            var tMessage = jQuery('<div class="message" />');
            var tUl = jQuery('<ul />');
            if (fData && jQuery.isArray(fData.result) && fData.result.length > 0) {
               olmData.locations = [];
               if (fData.categories && jQuery.isArray(fData.categories)) {
                  //   tMessage.text(l10n.fill('mobileDirectory.businessesNewFoundMessage'));
                  tMessage.html(l10n.fill('mobileDirectory.businessesFoundMessage'));
                  tSearchString = jQuery.map(fData.categories, function (a) { return a.Name }).join(', ');
               } else
                  tMessage.html(l10n.fill('mobileDirectory.businessesFoundMessage'));

               for (var tI in fData.result) {
                  var tItemLocation = fData.result[tI];

                  var tLi = jQuery('<li />');
                  var tTopDiv = jQuery('<div />');
                  if (tItemLocation.LogoImageUrl) {
                     var tLogImg = jQuery('<img class="logo" />').attr('src', LkEnv.StorageUrl() + tItemLocation.LogoImageUrl);
                     var tWrapper =jQuery('<div class="logo-wrapper"/>').append(tLogImg);
                     var tTopLeftDiv =jQuery('<div class="left-section"/>').append(tWrapper);
                     tTopDiv.append(tTopLeftDiv);
                     tTopDiv.attr('class', 'two-section');
                  }
                  var tTopRightDiv = jQuery('<div class="right-section"/>');
                  tTopDiv.append(tTopRightDiv);
                  tLi.append(tTopDiv);
                  var tTmp = jQuery('<a />').attr('class', 'base-link').attr('href', tmpCombineUri(tItemLocation.CompanyPage)).text(tItemLocation.Company || '').click(tmpLinkClickHandler);
                  tTmp = jQuery('<h3 />').append(tTmp);
                  if (tItemLocation.Distance) {
                     var distanceMessage = l10n.fill('mobileDirectory.headerCompanyDistancePostfix', tItemLocation.Distance.toFixed(1));
                     if (jQuery('.mobile-directory-holder:first form').find('input[name=lat]').val() == "" &&
                        jQuery('.mobile-directory-holder:first form').find('input[name=lon]').val() == "") {
                        distanceMessage = " (Distance to the location is not defined. GPS is not enabled or not allowed on your phone)";
                     }
                     tTmp.append(distanceMessage);
                  }
                  tTopRightDiv.append(tTmp);

                  tTmp = jQuery('<p />').appendTo(tTopRightDiv).text(tItemLocation.BusinessDescription || '');

                  var tCoupon = jQuery('<div class="coupon" />');
                  if (tItemLocation.Coupon && tItemLocation.Coupon.Name) {
                     jQuery('<a class="clip-it block-link"/>').attr('href', tmpCombineUri(tItemLocation.Coupon.Page)).click(tmpLinkClickHandler).appendTo(tCoupon);
                     jQuery('<h4 />').appendTo(tCoupon).text(tItemLocation.Coupon.Name || '');


                     if (tItemLocation.Coupon.Valid) {
                        jQuery('<span/>').appendTo(tCoupon).text(l10n.fill('mobileDirectory.validThoughMessage', tItemLocation.Coupon.Valid));
                     }
                  }

                  var tLocation = jQuery('<div class="location" />');

                  var tCoords = jQuery('<div class="coords" />');
                  var tInnerCoords = jQuery('<div/>');
                  tCoords.append(tInnerCoords);
                  //jQuery('<strong />').text(tItemLocation.Company || '').appendTo(tCoords);
                  //tCoords.append('<br />');
                  if (tItemLocation.Address.Address.trim().length > 0)
                     jQuery('<span />').appendTo(tInnerCoords).text(tItemLocation.Address.Address || '');

                  if (tItemLocation.Address.City.trim().length > 0)
                     jQuery('<span />').appendTo(tInnerCoords).text(' ' + tItemLocation.Address.City || '');

                  if (tItemLocation.Address.State.trim().length > 0)
                     jQuery('<span />').appendTo(tInnerCoords).text(' ' + tItemLocation.Address.State || '');

                  if (tItemLocation.Address.Zip.trim().length > 0)
                     jQuery('<span />').appendTo(tInnerCoords).text(', ' + tItemLocation.Address.Zip || '');

                  if (tItemLocation.Phone.trim().length > 0) {
                     var tPhone = tItemLocation.Phone.trim().split(/[^0-9+]/).join('');
                     tTmp = jQuery('<a />').attr('class', 'base-link').attr('href', 'tel:' + tPhone).attr('onclick', 'clickPhone(' + pageid + ',' + domainid + ',' + tItemLocation.LocationItemID + ')')
                        .text(l10n.fill('mobileDirectory.callButtonPrefix', LkEnv.formatter.phone(tPhone)));
                     tItemLocation.PhoneLinkFull = "<a href='tel:" + tPhone + "' onclick='clickPhone(" + pageid + ',' + domainid + ',' + tItemLocation.LocationItemID + ")'>Call: " + tPhone + "</a>";

                     var tPhoneDiv = jQuery('<div class="phone" />');
                     tPhoneDiv.append(tTmp);
                     tLocation.append(tPhoneDiv);
                  }

                  var tCustomFieldsDiv = jQuery('<div class="custom-fields" />');
                  var tCusomImagesUl = generateCustomImages(tItemLocation.CustomFields);
                  tCustomFieldsDiv.append(tCusomImagesUl);
                  tLocation.append(tCustomFieldsDiv);

                  var tImageDiv=jQuery('<div class="image"/>');
                  var tImage = jQuery('<a class="block-link"><img src="" /></a>');
                  if (fHolder.data('display-map-in-result') == 'False') {
                     tImageDiv.append(jQuery('<span class="view-map"><a class="base-link" href="#">View Map</a></span>'));
                     tImage.css('display','none');
                  }
                  tImageDiv.append(tImage);
                  if (fHolder.data('display-map-in-result') == 'False') {
                     tImageDiv.append(jQuery('<span style="display: none;" class="hide-map"><a class="base-link" href="#">Hide Map</a></span>'));
                  }
                  tImage.find('img').attr('src', getStaticMapSrc(tItemLocation.Latitude, tItemLocation.Longitude, 870, 400, 14));
                  var redirectUrl = 'http://maps.google.com/?q=' + tItemLocation.Latitude + ',' + tItemLocation.Longitude;
                  var href = '';
                  if (getStatisticLink) {
                     href = getStatisticLink('map', pageid, domainid, tItemLocation.LocationItemID, redirectUrl);
                     tImage.attr('href', href);
                     tImage.attr('target', '_blank');
                  }

                  tLocation = tLocation.append('<div class="clear"/>').append(tCoords).append(tImageDiv);

                  tLi.append('<div class="clear"/>');
                  if (tItemLocation.Coupon && tItemLocation.Coupon.Name) {
                     tLi.append(tCoupon);
                  }
                  tLi.append(tLocation);

                  tUl.append(tLi);

                  var olmLocation = convertBusinessToOLMap(tItemLocation);
                  olmData.locations.push(olmLocation);
               }
               tMobileResult.append(tUl);
               if (olmData.locations.length > 0 && tMapMultiPoints.length > 0) {
                  // set up the multi-point map
                  buildOLMapDirectory(olmData); // this func is inside MapMultiplePointsSnippet.cshtml

               }
            } else {
               if (fData.categories && jQuery.isArray(fData.categories))
                  tMessage.text(l10n.fill('mobileDirectory.businessesNotFoundMessage'));
               else
                  tMessage.html(l10n.fill('mobileDirectory.businessesNotFoundMessageWithSubject'));
               $('.multi-point-map').hide();
            }

            tMessage.find('strong').text(tSearchString);
            tMobileResult.prepend(tMessage);

            tMobileResult.append('<div class="divider" />');
            //tMobileResult.append('<a href="#" class="see-all">See all businesses that matched your search</a>');

            var tButton = jQuery('<input type="button" class="back-to-search" />').val(l10n.fill('mobileDirectory.backToSearchButtonLabel')).click(function () {
               var tHolder = jQuery(this).parents('.mobile-directory-holder:first');
               var tBackButtonLink = tHolder.find('input[name=bType]').val();
               if (tBackButtonLink == 's') {
                  var tQ = LkEnv.getQueryString();
                  if ('categories' in tQ) {
                     window.location.href = window.location.href.substring(0, window.location.href.indexOf('?'));
                  } else {
                     $('.multi-point-map').hide();
                     fHolder.removeClass('show-result');
                     tToHide.show();
                     fHolder.trigger('status-changed', ['form', fHolder.data('mode')]);
                  }
               } else window.location.href = "/";

            });
            tMobileResult.append(tButton);
         }

         var generateCustomImages = function (fCustomFields) {
            var tRoot = jQuery('<ul/>');
            if (fCustomFields) {
               for (var tI = 0; tI < fCustomFields.length; tI++) {
                  var tCustomField = fCustomFields[tI];
                  var tLi = jQuery('<li/>');
                  var tDiv = jQuery('<div/>');
                  tLi.append(tDiv);

                  var tImageSpan = jQuery('<span class="link-icon"/>');
                  if (tCustomField.FieldInfo.IconUrl) {
                     if (tCustomField.FieldInfo.IconUrl.indexOf("vectorIcon") == 0 && tCustomField.FieldInfo.IconUrl.indexOf("~") > -1) {
                        var valArgs = tCustomField.FieldInfo.IconUrl.split('~');
                        var className = valArgs[1];
                        var color = valArgs[2];
                        var tVectorIcon = jQuery('<i style="color:{0};font-size:36px" class="fa {1}"></i>'.format(color, className));
                        tImageSpan.append(tVectorIcon);
                     } else {
                        var tImageIcon = jQuery('<img />').attr('src', LkEnv.StorageUrl() + tCustomField.FieldInfo.IconUrl);
                        tImageSpan.append(tImageIcon);
                     }
                  }
                  tDiv.append(tImageSpan);

                  if (tCustomField.FieldInfo.DisplayName) {
                     var tNameWrapperSpan = jQuery('<span class="link-text-table-cell"/>');
                     var tNameSpan = jQuery('<span class="link-text"/>').text(tCustomField.FieldInfo.Name);
                     tNameWrapperSpan.append(tNameSpan);
                     tDiv.append(tNameWrapperSpan);
                  }

                  tRoot.append(tLi);
               }
            }
            return tRoot;
         };

         tMobileHolders.find('.mobile-directory-result').on("click", ".location .image .view-map a", function (event) {
            jQuery(this).parent().parent().find('a.block-link').css('display', 'block');
            jQuery(this).parent().parent().find('.view-map').hide();
            jQuery(this).parent().parent().find('.hide-map').show();
            event.preventDefault();
         });


         tMobileHolders.find('.mobile-directory-result').on("click", ".location .image .hide-map a", function (event) {
            jQuery(this).parent().parent().find('a.block-link').css('display', 'none');
            jQuery(this).parent().parent().find('.view-map').show();
            jQuery(this).parent().parent().find('.hide-map').hide();
            event.preventDefault();
         });
      }
   }
   LkExtender.register(loadMobileDirectory);
})();

///#source 1 1 /Styles/mobile-frontend/js/app.products-search.js
(function () {
   jQuery(document).ready(function () {
      var order = {};
      order.FieldId = jQuery('.form.product-search').data("sort-field-id");
      order.Asc = jQuery('.form.product-search').data("sort-asc");
      jQuery('.form.product-search form').submit(function () {
         var tPreloader = jQuery(this).parent().find('.preloader-wrapper');
         var tPageId = this['id'].value;
         var data = { Fields: [], OrderFieldId: order.FieldId, OrderAsc: order.Asc };
         for (var tI = 0; tI < this.length; tI++) {
            if (this[tI].name != 'id' && this[tI].type != 'submit') {
               if (this[tI].name.indexOf('from_')==0) {
                  var fieldId = this[tI].name.replace('from_', '');
                  if (this['to_' + fieldId]) {
                     data.Fields.push({ FieldId: fieldId, ValueFrom: this[tI].value, ValueTo: this['to_' + fieldId].value });
                  }
               } else {
                  if (!this[tI].name.indexOf('to_')==0) {
                     data.Fields.push({ FieldId: this[tI].name, Value: this[tI].value });
                  }
               }
            }
         }
         var url = "app/products/Search?pageid={0}".format(tPageId);
         tPreloader.show();
         var tProductsResultHost = jQuery(this).parent().find('.products-result-list');
         var tProducts = jQuery(this).parent().find('.products-result-list .products');
         tProductsResultHost.hide();
         Service.request(url, JSON.stringify(data), { timeout: 30000 },
            function (fData) {
               tProductsResultHost.show();
               tProducts.empty();
               for (var tI = 0; tI < fData.length; tI++) {
                  var tFields = jQuery('<ul class="fields"/>');
                  for (var tJ = 0; tJ < fData[tI].Fields.length; tJ++) {
                     var tField = jQuery('<li/>');
                     var tPlace = tField;
                     if (fData[tI].Fields[tJ].LinkToDetails) {
                        tPlace = jQuery('<a/>').attr('href', fData[tI].ProductUrl);
                        tField.append(tPlace);
                     }
                     tPlace.append(jQuery('<span class="field-name"/>').text(fData[tI].Fields[tJ].Label != '' ? fData[tI].Fields[tJ].Label + ' ' : '')).append(jQuery('<span class="field-value"/>').text(fData[tI].Fields[tJ].Value));
                     tFields.append(tField);
                  }
                  var tProduct = jQuery('<li/>');
                  tProduct.append(tFields);
                  tProducts.append(tProduct);
               }
            },
            function(fData) {
               if (fData.Messages) {
               } else {
                  alert(l10n.fill('common.errorLoadingData'));
               }
            },
            function(fData) {
               tPreloader.hide();
            });
         return false;
      });

      var startWithSearch = false;
      var items = LkEnv.getQueryString();
      if (jQuery('.form.product-search form').get(0) != undefined) {
         for (var itemName in items) {
            var elements = jQuery('.form.product-search form').get(0);
            for (var tI = 0; tI < elements.length; tI++)
            {
               if (elements[tI].name != 'id' && elements[tI].type != 'submit') {
                  if (elements[tI].getAttribute('fieldname') == itemName) {
                     if (elements[tI].className == 'datepicker') {
                        jQuery(elements[tI]).mobiscroll('setValue', items[itemName], true);
                     } else {
                        jQuery(elements[tI]).val(items[itemName]);
                     }
                     startWithSearch = true;
                  }
               }
            }
         }
      }
      if (items['order_field_name'] != undefined) {
         var elements = jQuery('.form.product-search form').get(0);
         for (var tI = 0; tI < elements.length; tI++) {
            if (elements[tI].name != 'id' && elements[tI].type != 'submit') {
               if (elements[tI].getAttribute('fieldname') == items['order_field_name'] ||
                  elements[tI].getAttribute('fieldname') == 'from_'+items['order_field_name'] ||
                  elements[tI].getAttribute('fieldname') == 'to_'+items['order_field_name']) {
                  order.FieldId = elements[tI].name.replace('from_', '').replace('to_');
                  startWithSearch = true;
                  break;
               }
            }
         }
      }
      if (items['order_asc'] != undefined) {
         order.Asc = items['order_asc'] == 'true';
         startWithSearch = true;
      }

      if (startWithSearch) {
         jQuery('.form.product-search form').submit();
      }
   });
})();

///#source 1 1 /Styles/mobile-frontend/js/app.header-menu.js
jQuery(document).ready(function () {
   var pRefreshMenuTypeTimeout = 0;
   var tParent = $(".block-header-menu");
   if (tParent.length) {

      tParent.find('.menu-icon').click(function () {
         var root = $(this).parents(".block-header-menu").find(".menu-wrapper");
         if (root.hasClass('overlay')) {
            $(this).parents(".block-header-menu").find(".nav-menu").toggle();
         }
         if (root.hasClass('slideout')) {
            var menuWrapper = $(this).parents(".block-header-menu").find(".menu-wrapper");
            var navMenu = menuWrapper.find(".nav-menu");
            var seconds = menuWrapper.data('slideout-speed') * 1000;
            var slideoutMenuWidth = menuWrapper.data('slideout-menu-width');
            navMenu.css('margin-left', '-' + slideoutMenuWidth);
            navMenu.show();
            menuWrapper.show();
            //navMenu.find('.header-glyph').hide();
            navMenu.animate({ 'margin-left': 0}, seconds, function () {
               //navMenu.find('.header-glyph').show();
               //navMenu.find('.header-glyph').removeAttr('style');
               navMenu.removeAttr('style');
            });
         }
      });

      tParent.find(".menu-wrapper.overlay").mouseleave(function () {
         var root = $(this).parents(".block-header-menu");
         if (root.find('.menu-icon-wrapper').css('display') != 'none') {
            root.find(".nav-menu").hide();
         }
      });
      tParent.find(".menu-wrapper.overlay .nav-menu .nav-close").click(function () {
         $(this).parents(".block-header-menu").find(".nav-menu").hide();
      });

      tParent.find(".menu-wrapper.slideout").click(function (e) {
         if (e.target !== this) return;

         var menuWrapper = $(this);
         var navMenu = menuWrapper.find(".nav-menu");
         var seconds = menuWrapper.data('slideout-speed') * 1000;
         var slideoutMenuWidth = menuWrapper.data('slideout-menu-width');
         navMenu.animate({ 'margin-left': '-' + slideoutMenuWidth}, seconds, function ()
         {
            menuWrapper.hide();
            navMenu.removeAttr('style');
         });
      });

      tParent.find(".menu-wrapper .nav-menu > ul > li.collapsible-menu").mouseenter(function (e) {
         var root = $(this).parents(".block-header-menu");
         if (root.find('.menu-icon-wrapper').css('display') == 'none'){
            $(this).addClass("show");
         }
      });

      tParent.find(".menu-wrapper .nav-menu > ul > li.collapsible-menu").mouseleave(function (e) {
         $(this).removeClass("show");
      });

      var pRefreshMenuType = function () {
         var tInnerParent = $(".block-header-menu");
         if (tInnerParent.length) {
            if (tInnerParent.find(".menu-icon-wrapper").css('display') == 'none') {
               var attr = tInnerParent.find(".nav-menu").attr('style');
               if (attr !== "undefined" && attr !== false && attr !== null) {
                  tInnerParent.find(".nav-menu").removeAttr('style');
               }
               attr = tInnerParent.find(".menu-wrapper").attr('style');
               if (attr !== "undefined" && attr !== false && attr !== null) {
                  tInnerParent.find(".menu-wrapper").removeAttr('style');
               }
            }
         }

         pRefreshMenuTypeTimeout = setTimeout(function () {
            clearTimeout(pRefreshMenuTypeTimeout);
            pRefreshMenuType();
         }, 500);
      }

      pRefreshMenuType();
   }
});


///#source 1 1 /Styles/mobile-frontend/js/app.contact-form.js
(function (jQuery) {
   function setupContactForm() {
      if (!LkEnv.IsPreview()) {
         jQuery('.contactform form a.header-link').on('click', function() {
            var form = jQuery(this).closest('form');
            if (checkForm(form.get(0).number.value)) {
               form.submit();
               return true;
            }
            return false;
         });
      }
   }

   LkExtender.register(setupContactForm);
})(jQuery);
///#source 1 1 /Styles/mobile-frontend/js/app.statistic.js
var gBaseUrlStatistic = '/';

function clickMap(fId, fDomainId, fLocationItemId, redirectUrl) {
   setTimeout(function () { tStatisticFix("map", fId, fDomainId, fLocationItemId, redirectUrl); }, 100);
}

function clickPhone(fId, fDomainId, fLocationItemId) {
   setTimeout(function () { tStatisticFix("phone", fId, fDomainId, fLocationItemId); }, 100);
}

function clickSms(fId, fDomainId) {
   setTimeout(function () { tStatisticFix("sms", fId, fDomainId, null); }, 100);
}

function tStatisticFix(fType, fId, fDomainId, fLocationItemId, redirectUrl) {
   if (!fType || !fId) {
      if (redirectUrl != null) {
         document.location.href = redirectUrl;
      } else {
         return;
      }
   }
   var url = gBaseUrlStatistic + 'handlers/' + fType + 'statistic.ashx?id=' + fId + '&d=' + fDomainId;
   if (fLocationItemId != null) {
      url += '&locationid=' + fLocationItemId;
   }
   url += '&_=' + new Date().getTime();
   jQuery.get(url, function () {
      if (redirectUrl != null) {
         document.location.href = redirectUrl;
      }
   });
}

function getStatisticLink(fType, fId, fDomainId, fLocationItemId, redirectUrl) {
   var url = gBaseUrlStatistic + 'handlers/' + fType + 'statistic.ashx?id=' + fId + '&d=' + fDomainId;
   if (fLocationItemId) {
      url += '&locationid=' + fLocationItemId;
   }
   if (redirectUrl) {
      url += '&returnurl=' + redirectUrl;
   }
   url += '&_=' + new Date().getTime();
   return url;
}

function clickEmailTell(fText, fSubject, fAddLink, fId, fDomainId) {
   var tLink = fAddLink === true ? window.location.href : "";
   var tText = (fText ? fText + ' ' : '') + tLink;
   if (fId && parseInt(fId) > 0) {
      setTimeout(function () { tStatisticFix("email", fId, fDomainId, null); }, 100);
      return true;
   } else {
      if (fSubject)
         window.location = "mailto:?subject=" + encodeURIComponent(fSubject) + "&body=" + encodeURIComponent(tText);
      else
         window.location = "mailto:?body=" + encodeURIComponent(tText);
   }

   return false;
}

jQuery(document).ready(function () {
   jQuery('.coupon-snippet-host').on('click', '.email-tell-link', function (fEvent) {
      fEvent.preventDefault();
      var tThis = jQuery(this);
      clickEmailTell(tThis.data('text'), tThis.data('subject'), tThis.data('addlink'));
   });
});


///#source 1 1 /Styles/mobile-frontend/js/app.add-to-home-screen.js
(function (jQuery) {
   var tScreen = window.screen;
   if(!tScreen) {
      return;
   }
   /**
    * Проверяем браузер
    */
   var tMessageBlock = jQuery('<div class="balloon" />');
   if(navigator.userAgent.match(/\((iphone|ipad|ipod);/i)) {
      var tM = '<img src="' + gResources + 'Styles/mobile-frontend/images/icons/ios.png"/>';
      tMessageBlock.append(l10n.fill('addToHomeScreen.ios').replace('{img}', tM));
   } else if(navigator.userAgent.match(/android/i)) {
      tMessageBlock.append(l10n.fill('addToHomeScreen.android'));
   } else if(navigator.userAgent.match(/blackberry/i)) {
      if(navigator.userAgent.substr(0, 10).toLowerCase() == 'blackberry') {
         return; /* BB 5 doesn't support this feature */
      }
      var tM = '<img src="' + gResources + 'Styles/mobile-frontend/images/icons/bb.png"/>';
      tMessageBlock.append(l10n.fill('addToHomeScreen.blackberry').replace('{img}', tM));
   } else {
      return;
   }

   tMessageBlock.prepend('<div class="closer">&times;</div>');

   function applyHandlerToLinks(fRoot) {
      fRoot.find('.add-to-home-screen').show().click('click', function(fEvent){ fEvent.preventDefault();tAddHelpBox();jQuery(document).scroll(); });
   }

   var tBlock = false;
   var tAddHelpBox = function() {
      if(!tBlock) {
         tBlock = jQuery('<div class="block-add-to-home-screen"><div style="margin:0 5px;"></div></div>');
         tBlock.find('div').append(tMessageBlock);
      }
      jQuery('body').append(tBlock);

      if(!LkEnv.browser.supportPositionFixed) {
         tBlock.addClass('position-fixed-fail');
         jQuery(document).scroll(tScrollHandler).scroll();
         jQuery(window).scroll(tScrollHandler).scroll();
      } else {

      }

      tMessageBlock.click(tDestroyHandler);
   };

   var tScrollHandler = function() {
      var tHeight = Math.min(tScreen.availHeight, window.innerHeight);
      tBlock.css('top', jQuery(document).scrollTop() + tHeight - tMessageBlock.height() - 20);
   };

   var tDestroyHandler = function(fEvent) {
      if(fEvent)
         fEvent.preventDefault();
      if(!LkEnv.browser.supportPositionFixed) {
         jQuery(document).unbind('scroll', tScrollHandler);
         jQuery(window).unbind('scroll', tScrollHandler);
      }
      tMessageBlock.unbind('click', tDestroyHandler);
      tBlock.remove();
      tBlock = false;
   };

   jQuery(document).ready(function () {
      if(typeof gShowAddToHome != 'undefined' && gShowAddToHome === true) {
         var tIcon = jQuery('head link[rel=apple-touch-icon]');
         if(tIcon.length > 0) {
            var tB = jQuery('<div class="icon-holder"><img /></div>');
            tB.find('img').attr('src', tIcon.attr('href'));
            tMessageBlock.prepend(tB).addClass('has-icon');
         }

         var tCookies = (document.cookie || '').split(';');
         for(var tC in tCookies)
            if(tCookies[tC].indexOf('add-to-home-screen-off') >= 0)
               return;

         document.cookie = 'add-to-home-screen-off=true';
         setTimeout(function() {
            tAddHelpBox();
            tMessageBlock.click(tDestroyHandler);
            setTimeout(tDestroyHandler, 15000);
         }, 500);
      }
   });

   LkExtender.register(applyHandlerToLinks);
})(jQuery);

///#source 1 1 /Scripts/lib/mobiscroll.custom-2.9.1.min.js
(function(a){function o(a){for(var b in a)if(void 0!==S[a[b]])return!0;return!1}function A(a,b){var c=a.originalEvent,d=a.changedTouches;return d||c&&c.changedTouches?c?c.changedTouches[0]["page"+b]:d[0]["page"+b]:a["page"+b]}function P(b,d,c){var g=b;if("object"===typeof d)return b.each(function(){this.id||(this.id="mobiscroll"+ ++m);r[this.id]&&r[this.id].destroy();new a.mobiscroll.classes[d.component||"Scroller"](this,d)});"string"===typeof d&&b.each(function(){var a;if((a=r[this.id])&&a[d])if(a=
a[d].apply(this,Array.prototype.slice.call(c,1)),void 0!==a)return g=a,!1});return g}function C(a){if("touchstart"==a.type)d[a.target]=!0;else if(d[a.target])return delete d[a.target],!1;return!0}var m=+new Date,d={},r={},l=a.extend,S=document.createElement("modernizr").style,y=o(["perspectiveProperty","WebkitPerspective","MozPerspective","OPerspective","msPerspective"]),k=function(){var a=["Webkit","Moz","O","ms"],b;for(b in a)if(o([a[b]+"Transform"]))return"-"+a[b].toLowerCase()+"-";return""}(),
b=k.replace(/^\-/,"").replace(/\-$/,"").replace("moz","Moz");a.fn.mobiscroll=function(b){l(this,a.mobiscroll.components);return P(this,b,arguments)};a.mobiscroll=a.mobiscroll||{util:{prefix:k,jsPrefix:b,has3d:y,getCoord:A,testTouch:C},presets:{},themes:{},i18n:{},instances:r,classes:{},components:{},defaults:{},setDefaults:function(a){l(defaults,a)},presetShort:function(a,b){this.components[a]=function(c){return P(this,l(c,{component:b,preset:a}),arguments)}}};a.scroller=a.scroller||a.mobiscroll;
a.fn.scroller=a.fn.scroller||a.fn.mobiscroll})(jQuery);(function(a){function o(){d=!0;setTimeout(function(){d=!1},300)}function A(a,b,c){return Math.max(b,Math.min(a,c))}function P(b){var c={values:[],keys:[]};a.each(b,function(a,b){c.keys.push(a);c.values.push(b)});return c}a.mobiscroll.classes.Scroller=function(h,u){function B(a,p,f){a.stopPropagation();a.preventDefault();if(!M&&!w(p)&&!p.hasClass("dwa")){M=!0;var b=p.find(".dw-ul");za(b);clearInterval(sa);sa=setInterval(function(){f(b)},e.delay);f(b)}}function w(n){return a.isArray(e.readonly)?(n=
a(".dwwl",q).index(n),e.readonly[n]):e.readonly}function y(n){var p='<div class="dw-bf">',n=Aa[n],n=n.values?n:P(n),e=1,b=n.labels||[],f=n.values,c=n.keys||f;a.each(f,function(a,n){0==e%20&&(p+='</div><div class="dw-bf">');p+='<div role="option" aria-selected="false" class="dw-li dw-v" data-val="'+c[a]+'"'+(b[a]?' aria-label="'+b[a]+'"':"")+' style="height:'+N+"px;line-height:"+N+'px;"><div class="dw-i">'+n+"</div></div>";e++});return p+="</div>"}function za(n){T=a(".dw-li",n).index(a(".dw-v",n).eq(0));
U=a(".dw-li",n).index(a(".dw-v",n).eq(-1));Q=a(".dw-ul",q).index(n)}function fa(a){var p=e.headerText;return p?"function"===typeof p?p.call(Y,a):p.replace(/\{value\}/i,a):""}function J(){f.temp=f.values?f.values.slice(0):e.parseValue(K.val()||"",f);W()}function Ba(n){var p=window.getComputedStyle?getComputedStyle(n[0]):n[0].style,e;z?(a.each(["t","webkitT","MozT","OT","msT"],function(a,n){if(void 0!==p[n+"ransform"])return e=p[n+"ransform"],!1}),e=e.split(")")[0].split(", "),n=e[13]||e[5]):n=p.top.replace("px",
"");return Math.round(j-n/N)}function ta(a,p){clearTimeout(ma[p]);delete ma[p];a.closest(".dwwl").removeClass("dwa")}function Z(a,p,e,f,c){var s=(j-e)*N,d=a[0].style;s==ua[p]&&ma[p]||(f&&s!=ua[p]&&v("onAnimStart",[q,p,f]),ua[p]=s,d[b+"Transition"]="all "+(f?f.toFixed(3):0)+"s ease-out",z?d[b+"Transform"]="translate3d(0,"+s+"px,0)":d.top=s+"px",ma[p]&&ta(a,p),f&&c&&(a.closest(".dwwl").addClass("dwa"),ma[p]=setTimeout(function(){ta(a,p)},1E3*f)),pa[p]=e)}function $(n,p,e){var n=a('.dw-li[data-val="'+
n+'"]',p),p=a(".dw-li",p),f=p.index(n),b=p.length;if(!n.hasClass("dw-v")){for(var c=n,s=0,d=0;0<=f-s&&!c.hasClass("dw-v");)s++,c=p.eq(f-s);for(;f+d<b&&!n.hasClass("dw-v");)d++,n=p.eq(f+d);(d<s&&d&&2!==e||!s||0>f-s||1==e)&&n.hasClass("dw-v")?f+=d:(n=c,f-=s)}return{cell:n,v:f,val:n.attr("data-val")}}function X(n,p,b,c,s){!1!==v("validate",[q,p,n,c])&&(a(".dw-ul",q).each(function(b){var d=a(this),h=b==p||void 0===p,ya=$(f.temp[b],d,c),j=ya.cell;if(!j.hasClass("dw-sel")||h)f.temp[b]=ya.val,e.multiple||
(a(".dw-sel",d).removeAttr("aria-selected"),j.attr("aria-selected","true")),a(".dw-sel",d).removeClass("dw-sel"),j.addClass("dw-sel"),Z(d,b,ya.v,h?n:0.1,h?s:!1)}),aa=e.formatResult(f.temp),f.live&&W(b,b,0,!0),a(".dwv",q).html(fa(aa)),b&&v("onChange",[aa]))}function v(n,e){var b;e.push(f);a.each([Ca,Da,u],function(a,f){f&&f[n]&&(b=f[n].apply(Y,e))});return b}function ba(n,b,c,s,d){var b=A(b,T,U),h=a(".dw-li",n).eq(b),j=void 0===d?b:d,q=void 0!==d,g=Q,i=s?b==j?0.1:Math.abs((b-j)*e.timeUnit):0;f.temp[g]=
h.attr("data-val");Z(n,g,b,i,q);setTimeout(function(){X(i,g,!0,c,q)},10)}function ka(a){var b=pa[Q]+1;ba(a,b>U?T:b,1,!0)}function ca(a){var b=pa[Q]-1;ba(a,b<T?U:b,2,!0)}function W(a,b,c,s,d){la&&!s&&X(c);aa=e.formatResult(f.temp);d||(f.values=f.temp.slice(0),f.val=aa);a&&(na&&(K.val(aa),b&&(Ea=!0,K.change())),v("onValueFill",[aa,b]))}function s(a,b){var e;da.on(a,function(){clearTimeout(e);e=setTimeout(function(){(va&&b||!b)&&f.position(!b)},200)})}var j,N,aa,q,wa,Ha,Ia,Ja,qa,ga,va,ha,Ca,Fa,M,G,E,
x,ia,Ka,R,ra,T,U,H,O,Q,sa,ja,Ea,Ga,da,xa,V,F,f=this,Y=h,K=a(Y),e=t({},ea),Da={},ma={},pa={},ua={},Aa=[],La=[],na=K.is("input"),la=!1,Pa=function(b){c(b)&&!m&&!M&&!F&&!w(this)&&(b.preventDefault(),m=!0,E="clickpick"!=e.mode,O=a(".dw-ul",this),za(O),ra=(x=void 0!==ma[Q])?Ba(O):pa[Q],ia=i(b,"Y"),Ka=new Date,R=ia,Z(O,Q,ra,0.001),E&&O.closest(".dwwl").addClass("dwa"),a(document).on(oa,Ma).on(D,Na))},Ma=function(a){E&&(a.preventDefault(),a.stopPropagation(),R=i(a,"Y"),Z(O,Q,A(ra+(ia-R)/N,T-1,U+1)));ia!==
R&&(x=!0)},Na=function(){var b=new Date-Ka,f=A(ra+(ia-R)/N,T-1,U+1),c,s=O.offset().top;300>b?(b=(R-ia)/b,c=b*b/e.speedUnit,0>R-ia&&(c=-c)):c=R-ia;b=Math.round(ra-c/N);if(!c&&!x){var s=Math.floor((R-s)/N),d=a(a(".dw-li",O)[s]);c=E;!1!==v("onValueTap",[d])?b=s:c=!0;c&&(d.addClass("dw-hl"),setTimeout(function(){d.removeClass("dw-hl")},200))}E&&ba(O,b,0,!0,Math.round(f));m=!1;O=null;a(document).off(oa,Ma).off(D,Na)},Qa=function(b){F&&F.removeClass("dwb-a");F=a(this);a(document).on(D,Oa);!F.hasClass("dwb-d")&&
!F.hasClass("dwb-nhl")&&F.addClass("dwb-a");F.hasClass("dwwb")&&c(b)&&B(b,F.closest(".dwwl"),F.hasClass("dwwbp")?ka:ca)},Oa=function(){M&&(clearInterval(sa),M=!1);F&&(F.removeClass("dwb-a"),F=null);a(document).off(D,Oa)},Ra=function(b){38==b.keyCode?B(b,a(this),ca):40==b.keyCode&&B(b,a(this),ka)},Sa=function(){M&&(clearInterval(sa),M=!1)},Ta=function(b){if(!w(this)){b.preventDefault();var b=b.originalEvent||b,b=b.wheelDelta?b.wheelDelta/120:b.detail?-b.detail/3:0,e=a(".dw-ul",this);za(e);ba(e,Math.round(pa[Q]-
b),0>b?1:2)}};f.position=function(b){var c=wa.width(),s=da[0].innerHeight||da.innerHeight();if(!(Ia===c&&Ja===s&&b)&&!Ga&&!1!==v("onPosition",[q,c,s])&&H){var d,h,j,g,i,m,l,w,k,B=0,F=0,b=da.scrollLeft(),r=da.scrollTop();g=a(".dwwr",q);var t=a(".dw",q),u={};i=void 0===e.anchor?K:e.anchor;/modal|bubble/.test(e.display)&&(a(".dwc",q).each(function(){d=a(this).outerWidth(!0);B+=d;F=d>F?d:F}),d=B>c?F:B,g.width(d).css("white-space",B>c?"":"nowrap"));qa=t.outerWidth();ga=t.outerHeight(!0);va=ga<=s&&qa<=
c;f.scrollLock=va;"modal"==e.display?(h=(c-qa)/2,j=r+(s-ga)/2):"bubble"==e.display?(k=!0,w=a(".dw-arrw-i",q),j=i.offset(),m=Math.abs(a(e.context).offset().top-j.top),l=Math.abs(a(e.context).offset().left-j.left),g=i.outerWidth(),i=i.outerHeight(),h=A(l-(t.outerWidth(!0)-g)/2-b,3,c-qa-3),j=m-ga,j<r||m>r+s?(t.removeClass("dw-bubble-top").addClass("dw-bubble-bottom"),j=m+i):t.removeClass("dw-bubble-bottom").addClass("dw-bubble-top"),w=w.outerWidth(),g=A(l+g/2-(h+(qa-w)/2)-b,0,w),a(".dw-arr",q).css({left:g})):
"top"==e.display?j=r:"bottom"==e.display&&(j=r+s-ga);u.top=0>j?0:j;u.left=h;t.css(u);wa.height(0);h=Math.max(j+ga,"body"==e.context?a(document).height():xa.scrollHeight);wa.css({height:h,left:b});if(k&&(j+ga>r+s||m>r+s))Ga=!0,setTimeout(function(){Ga=false},300),da.scrollTop(Math.min(j+ga-s,h-s))}Ia=c;Ja=s};f.enable=function(){e.disabled=!1;na&&K.prop("disabled",!1)};f.disable=function(){e.disabled=!0;na&&K.prop("disabled",!0)};f.setValue=function(b,c,s,d,h){f.temp=a.isArray(b)?b.slice(0):e.parseValue.call(Y,
b+"",f);W(c,void 0===h?c:h,s,!1,d)};f.getValue=function(){return f.values};f.getValues=function(){var a=[],b;for(b in f._selectedValues)a.push(f._selectedValues[b]);return a};f.changeWheel=function(b,c,s){if(q){var d=0,h=b.length;a.each(e.wheels,function(e,j){a.each(j,function(e,j){if(-1<a.inArray(d,b)&&(Aa[d]=j,a(".dw-ul",q).eq(d).html(y(d)),h--,!h))return f.position(),X(c,void 0,s),!1;d++});if(!h)return!1})}};f.isVisible=function(){return la};f.tap=function(a,b){var c,f;if(e.tap)a.on("touchstart.dw mousedown.dw",
function(a){a.preventDefault();c=i(a,"X");f=i(a,"Y")}).on("touchend.dw",function(a){20>Math.abs(i(a,"X")-c)&&20>Math.abs(i(a,"Y")-f)&&b.call(this,a);o()});a.on("click.dw",function(a){d||b.call(this,a);a.preventDefault()})};f.show=function(b){var c,d=0,h="";if(!e.disabled&&!la){"top"==e.display&&(ha="slidedown");"bottom"==e.display&&(ha="slideup");J();v("onBeforeShow",[]);ha&&!b&&(h="dw-"+ha+" dw-in");var j='<div role="dialog" class="'+e.theme+" dw-"+e.display+(k?" dw"+k.replace(/\-$/,""):"")+(G?"":
" dw-nobtn")+'"><div class="dw-persp">'+(!H?'<div class="dw dwbg dwi">':'<div class="dwo"></div><div class="dw dwbg '+h+'"><div class="dw-arrw"><div class="dw-arrw-i"><div class="dw-arr"></div></div></div>')+'<div class="dwwr"><div aria-live="assertive" class="dwv'+(e.headerText?"":" dw-hidden")+'"></div><div class="dwcc">',i=a.isArray(e.minWidth),m=a.isArray(e.maxWidth),w=a.isArray(e.fixedWidth);a.each(e.wheels,function(b,f){j+='<div class="dwc'+("scroller"!=e.mode?" dwpm":" dwsc")+(e.showLabel?
"":" dwhl")+'"><div class="dwwc dwrc"><table cellpadding="0" cellspacing="0"><tr>';a.each(f,function(a,b){Aa[d]=b;c=void 0!==b.label?b.label:a;j+='<td><div class="dwwl dwrc dwwl'+d+'">'+("scroller"!=e.mode?'<a href="#" tabindex="-1" class="dwb-e dwwb dwwbp" style="height:'+N+"px;line-height:"+N+'px;"><span>+</span></a><a href="#" tabindex="-1" class="dwb-e dwwb dwwbm" style="height:'+N+"px;line-height:"+N+'px;"><span>&ndash;</span></a>':"")+'<div class="dwl">'+c+'</div><div tabindex="0" aria-live="off" aria-label="'+
c+'" role="listbox" class="dwww"><div class="dww" style="height:'+e.rows*N+"px;"+(e.fixedWidth?"width:"+(w?e.fixedWidth[d]:e.fixedWidth)+"px;":(e.minWidth?"min-width:"+(i?e.minWidth[d]:e.minWidth)+"px;":"min-width:"+e.width+"px;")+(e.maxWidth?"max-width:"+(m?e.maxWidth[d]:e.maxWidth)+"px;":""))+'"><div class="dw-ul">';j+=y(d);j+='</div><div class="dwwol"></div></div><div class="dwwo"></div></div><div class="dwwol"></div></div></td>';d++});j+="</tr></table></div></div>"});j+="</div>";H&&G&&(j+='<div class="dwbc">',
a.each(V,function(a,b){b="string"===typeof b?f.buttons[b]:b;j+="<span"+(e.btnWidth?' style="width:'+100/V.length+'%"':"")+' class="dwbw '+b.css+'"><a href="#" class="dwb dwb'+a+' dwb-e" role="button">'+b.text+"</a></span>"}),j+="</div>");j+="</div></div></div></div>";q=a(j);wa=a(".dw-persp",q);Ha=a(".dwo",q);la=!0;X();v("onMarkupReady",[q]);H?(q.appendTo(e.context),ha&&!b&&(q.addClass("dw-trans"),setTimeout(function(){q.removeClass("dw-trans").find(".dw").removeClass(h)},350))):K.is("div")?K.html(q):
q.insertAfter(K);v("onMarkupInserted",[q]);if(H){a(window).on("keydown.dw",function(a){a.keyCode==13?f.select():a.keyCode==27&&f.cancel()});if(e.scrollLock)q.on("touchmove",function(a){va&&a.preventDefault()});a("input,select,button",xa).each(function(){if(!this.disabled){a(this).attr("autocomplete")&&a(this).data("autocomplete",a(this).attr("autocomplete"));a(this).addClass("dwtd").prop("disabled",true).attr("autocomplete","off")}});s("scroll.dw",!0)}f.position();s("orientationchange.dw resize.dw",
!1);q.on("DOMMouseScroll mousewheel",".dwwl",Ta).on("keydown",".dwwl",Ra).on("keyup",".dwwl",Sa).on("selectstart mousedown",g).on("click",".dwb-e",g).on("touchend",function(){e.tap&&o()}).on("keydown",".dwb-e",function(b){if(b.keyCode==32){b.preventDefault();b.stopPropagation();a(this).click()}});setTimeout(function(){a.each(V,function(b,c){f.tap(a(".dwb"+b,q),function(a){c=typeof c==="string"?f.buttons[c]:c;c.handler.call(this,a,f)})});e.closeOnOverlay&&f.tap(Ha,function(){f.cancel()});q.on(L,".dwwl",
Pa).on(L,".dwb-e",Qa)},300);v("onShow",[q,aa])}};f.hide=function(b,c,e){if(la&&(e||!1!==v("onClose",[aa,c])))a(".dwtd",xa).each(function(){a(this).prop("disabled",!1).removeClass("dwtd");a(this).data("autocomplete")?a(this).attr("autocomplete",a(this).data("autocomplete")):a(this).removeAttr("autocomplete")}),q&&((c=H&&ha&&!b)&&q.addClass("dw-trans").find(".dw").addClass("dw-"+ha+" dw-out"),b?q.remove():setTimeout(function(){q.remove();C&&(r=!0,C.focus())},c?350:1),da.off(".dw")),ua={},la=!1};f.select=
function(){!1!==f.hide(!1,"set")&&(W(!0,!0,0,!0),v("onSelect",[f.val]))};f.attachShow=function(a,b){La.push(a);if("inline"!==e.display)a.on((e.showOnFocus?"focus.dw":"")+(e.showOnTap?" click.dw":""),function(c){if(("focus"!==c.type||"focus"===c.type&&!r)&&!d)b&&b(),C=a,f.show();setTimeout(function(){r=!1},300)})};f.cancel=function(){!1!==f.hide(!1,"cancel")&&v("onCancel",[f.val])};f.init=function(b){Ca=l.themes[b.theme||e.theme];Fa=l.i18n[b.lang||e.lang];t(u,b);v("onThemeLoad",[Fa,u]);t(e,Ca,Fa,u);
e.buttons=e.buttons||["set","cancel"];e.headerText=void 0===e.headerText?"inline"!==e.display?"{value}":!1:e.headerText;f.settings=e;K.off(".dw");if(b=l.presets[e.preset])Da=b.call(Y,f),t(e,Da,u);j=Math.floor(e.rows/2);N=e.height;ha=e.animate;H="inline"!==e.display;V=e.buttons;da=a("body"==e.context?window:e.context);xa=a(e.context)[0];e.setText||V.splice(a.inArray("set",V),1);e.cancelText||V.splice(a.inArray("cancel",V),1);e.button3&&V.splice(a.inArray("set",V)+1,0,{text:e.button3Text,handler:e.button3});
f.context=da;f.live=!H||-1==a.inArray("set",V);f.buttons.set={text:e.setText,css:"dwb-s",handler:f.select};f.buttons.cancel={text:f.live?e.closeText:e.cancelText,css:"dwb-c",handler:f.cancel};f.buttons.clear={text:e.clearText,css:"dwb-cl",handler:function(){f.trigger("onClear",[q]);K.val("");f.live||f.hide(!1,"clear")}};G=0<V.length;la&&f.hide(!0,!1,!0);H?(J(),na&&(void 0===ja&&(ja=Y.readOnly),Y.readOnly=!0),f.attachShow(K)):f.show();if(na)K.on("change.dw",function(){Ea||f.setValue(K.val(),false,
0.2);Ea=false})};f.option=function(a,b){var c={};"object"===typeof a?c=a:c[a]=b;f.init(c)};f.destroy=function(){f.hide(!0,!1,!0);a.each(La,function(a,b){b.off(".dw")});a(window).off(".dwa");na&&(Y.readOnly=ja);delete S[Y.id];v("onDestroy",[])};f.getInst=function(){return f};f.getValidCell=$;f.trigger=v;S[Y.id]=f;f.values=null;f.val=null;f.temp=null;f.buttons={};f._selectedValues={};f.init(u)};var C,m,d,r,l=a.mobiscroll,S=l.instances,y=l.util,k=y.prefix,b=y.jsPrefix,z=y.has3d,i=y.getCoord,c=y.testTouch,
g=function(a){a.preventDefault()},t=a.extend,L="touchstart mousedown",oa="touchmove mousemove",D="touchend mouseup",ea=t(l.defaults,{width:70,height:40,rows:3,delay:300,disabled:!1,readonly:!1,closeOnOverlay:!0,showOnFocus:!0,showOnTap:!0,showLabel:!0,wheels:[],theme:"",display:"modal",mode:"scroller",preset:"",lang:"en-US",context:"body",scrollLock:!0,tap:!0,btnWidth:!0,speedUnit:0.0012,timeUnit:0.1,formatResult:function(a){return a.join(" ")},parseValue:function(b,c){var d=b.split(" "),g=[],i=0,
m;a.each(c.settings.wheels,function(b,c){a.each(c,function(b,c){c=c.values?c:P(c);m=c.keys||c.values;-1!==a.inArray(d[i],m)?g.push(d[i]):g.push(m[0]);i++})});return g}});l.i18n.en=l.i18n["en-US"]={setText:"Set",selectedText:"Selected",closeText:"Close",cancelText:"Cancel",clearText:"Clear"};a(window).on("focus",function(){C&&(r=!0)});a(document).on("mouseover mouseup mousedown click",function(a){if(d)return a.stopPropagation(),a.preventDefault(),!1})})(jQuery);(function(a){var o=a.mobiscroll,A=new Date,P={startYear:A.getFullYear()-100,endYear:A.getFullYear()+1,shortYearCutoff:"+10",showNow:!1,stepHour:1,stepMinute:1,stepSecond:1,separator:" "},C=function(m){function d(a,b,c){return void 0!==w[b]?+a[w[b]]:void 0!==c?c:X[I[b]]?X[I[b]]():I[b](X)}function r(a,b,c,d){a.push({values:c,keys:b,label:d})}function l(a,b){return Math.floor(a/b)*b}function S(a){var b=d(a,"h",0);return new Date(d(a,"y"),d(a,"m"),d(a,"d",1),d(a,"a")?b+12:b,d(a,"i",0),d(a,"s",0))}function y(b,
c){return a(".dw-li",b).index(a('.dw-li[data-val="'+c+'"]',b))}var k=a(this),b={},z;if(k.is("input")){switch(k.attr("type")){case "date":z="yy-mm-dd";break;case "datetime":z="yy-mm-ddTHH:ii:ssZ";break;case "datetime-local":z="yy-mm-ddTHH:ii:ss";break;case "month":z="yy-mm";b.dateOrder="mmyy";break;case "time":z="HH:ii:ss"}var i=k.attr("min"),k=k.attr("max");i&&(b.minDate=o.parseDate(z,i));k&&(b.maxDate=o.parseDate(z,k))}var c,g,t,L,A,D,ea,i=a.extend({},m.settings),h=a.extend(m.settings,P,b,i),u=0,
k=[],B=[],w={},I={y:"getFullYear",m:"getMonth",d:"getDate",h:function(a){a=a.getHours();a=Z&&12<=a?a-12:a;return l(a,v)},i:function(a){return l(a.getMinutes(),ba)},s:function(a){return l(a.getSeconds(),ka)},a:function(a){return ta&&11<a.getHours()?1:0}},C=h.preset,fa=h.dateOrder,J=h.timeWheels,Ba=fa.match(/D/),ta=J.match(/a/i),Z=J.match(/h/),$="datetime"==C?h.dateFormat+h.separator+h.timeFormat:"time"==C?h.timeFormat:h.dateFormat,X=new Date,v=h.stepHour,ba=h.stepMinute,ka=h.stepSecond,ca=h.minDate||
new Date(h.startYear,0,1),W=h.maxDate||new Date(h.endYear,11,31,23,59,59);z=z||$;if(C.match(/date/i)){a.each(["y","m","d"],function(a,b){c=fa.search(RegExp(b,"i"));-1<c&&B.push({o:c,v:b})});B.sort(function(a,b){return a.o>b.o?1:-1});a.each(B,function(a,b){w[b.v]=a});i=[];for(b=0;3>b;b++)if(b==w.y){u++;t=[];g=[];L=ca.getFullYear();A=W.getFullYear();for(c=L;c<=A;c++)g.push(c),t.push(fa.match(/yy/i)?c:(c+"").substr(2,2));r(i,g,t,h.yearText)}else if(b==w.m){u++;t=[];g=[];for(c=0;12>c;c++)L=fa.replace(/[dy]/gi,
"").replace(/mm/,9>c?"0"+(c+1):c+1).replace(/m/,c+1),g.push(c),t.push(L.match(/MM/)?L.replace(/MM/,'<span class="dw-mon">'+h.monthNames[c]+"</span>"):L.replace(/M/,'<span class="dw-mon">'+h.monthNamesShort[c]+"</span>"));r(i,g,t,h.monthText)}else if(b==w.d){u++;t=[];g=[];for(c=1;32>c;c++)g.push(c),t.push(fa.match(/dd/i)&&10>c?"0"+c:c);r(i,g,t,h.dayText)}k.push(i)}if(C.match(/time/i)){ea=!0;B=[];a.each(["h","i","s","a"],function(a,b){a=J.search(RegExp(b,"i"));-1<a&&B.push({o:a,v:b})});B.sort(function(a,
b){return a.o>b.o?1:-1});a.each(B,function(a,b){w[b.v]=u+a});i=[];for(b=u;b<u+4;b++)if(b==w.h){u++;t=[];g=[];for(c=0;c<(Z?12:24);c+=v)g.push(c),t.push(Z&&0==c?12:J.match(/hh/i)&&10>c?"0"+c:c);r(i,g,t,h.hourText)}else if(b==w.i){u++;t=[];g=[];for(c=0;60>c;c+=ba)g.push(c),t.push(J.match(/ii/)&&10>c?"0"+c:c);r(i,g,t,h.minuteText)}else if(b==w.s){u++;t=[];g=[];for(c=0;60>c;c+=ka)g.push(c),t.push(J.match(/ss/)&&10>c?"0"+c:c);r(i,g,t,h.secText)}else b==w.a&&(u++,g=J.match(/A/),r(i,[0,1],g?["AM","PM"]:["am",
"pm"],h.ampmText));k.push(i)}m.setDate=function(a,b,c,d,h){for(var g in w)m.temp[w[g]]=a[I[g]]?a[I[g]]():I[g](a);m.setValue(m.temp,b,c,d,h)};m.getDate=function(a){return S(a?m.temp:m.values)};m.convert=function(b){var c=b;a.isArray(b)||(c=[],a.each(b,function(b,d){a.each(d,function(a,d){"daysOfWeek"===b&&(d.d?d.d="w"+d.d:d="w"+d);c.push(d)})}));return c};m.format=$;m.buttons.now={text:h.nowText,css:"dwb-n",handler:function(){m.setDate(new Date,!1,0.3,!0,!0)}};h.showNow&&h.buttons.splice(a.inArray("set",
h.buttons)+1,0,"now");D=h.invalid?m.convert(h.invalid):!1;return{wheels:k,headerText:h.headerText?function(){return o.formatDate($,S(m.temp),h)}:!1,formatResult:function(a){return o.formatDate(z,S(a),h)},parseValue:function(a){var a=o.parseDate(z,a,h),b,c=[];for(b in w)c[w[b]]=a[I[b]]?a[I[b]]():I[b](a);return c},validate:function(b,c,g,i){var q=m.temp,r={y:ca.getFullYear(),m:0,d:1,h:0,i:0,s:0,a:0},t={y:W.getFullYear(),m:11,d:31,h:l(Z?11:23,v),i:l(59,ba),s:l(59,ka),a:1},k={h:v,i:ba,s:ka,a:1},B=d(q,
"y"),u=d(q,"m"),z=!0,S=!0;a.each("y,m,d,a,h,i,s".split(","),function(c,g){if(w[g]!==void 0){var j=r[g],k=t[g],f=31,l=d(q,g),o=a(".dw-ul",b).eq(w[g]);if(g=="d"){k=f=32-(new Date(B,u,32)).getDate();Ba&&a(".dw-li",o).each(function(){var b=a(this),c=b.data("val"),d=(new Date(B,u,c)).getDay(),c=fa.replace(/[my]/gi,"").replace(/dd/,c<10?"0"+c:c).replace(/d/,c);a(".dw-i",b).html(c.match(/DD/)?c.replace(/DD/,'<span class="dw-day">'+h.dayNames[d]+"</span>"):c.replace(/D/,'<span class="dw-day">'+h.dayNamesShort[d]+
"</span>"))})}z&&ca&&(j=ca[I[g]]?ca[I[g]]():I[g](ca));S&&W&&(k=W[I[g]]?W[I[g]]():I[g](W));if(g!="y"){var e=y(o,j),v=y(o,k);a(".dw-li",o).removeClass("dw-v").slice(e,v+1).addClass("dw-v");g=="d"&&a(".dw-li",o).removeClass("dw-h").slice(f).addClass("dw-h")}l<j&&(l=j);l>k&&(l=k);z&&(z=l==j);S&&(S=l==k);if(D&&g=="d"){for(var x,k=(new Date(B,u,1)).getDay(),e=[],j=0;j<D.length;j++){v=D[j];x=v+"";if(!v.start)if(v.getTime)v.getFullYear()==B&&v.getMonth()==u&&e.push(v.getDate()-1);else if(x.match(/w/i)){x=
+x.replace("w","");for(v=x-k;v<f;v=v+7)v>=0&&e.push(v)}else{x=x.split("/");x[1]?x[0]-1==u&&e.push(x[1]-1):e.push(x[0]-1)}}a.each(e,function(b,c){a(".dw-li",o).eq(c).removeClass("dw-v")});l=m.getValidCell(l,o,i).val}q[w[g]]=l}});if(ea&&D){var o,L,A,M,G,E,x,C,J,R,P,T,U,H,O,Q,X={},ja=d(q,"d"),oa=new Date(B,u,ja),$=["a","h","i","s"];a.each(D,function(a,b){if(b.start&&(b.apply=!1,o=b.d,L=o+"",M=L.split("/"),o&&(o.getTime&&B==o.getFullYear()&&u==o.getMonth()&&ja==o.getDate()||!L.match(/w/i)&&(M[1]&&ja==
M[1]&&u==M[0]-1||!M[1]&&ja==M[0])||L.match(/w/i)&&oa.getDay()==+L.replace("w",""))))b.apply=!0,X[oa]=!0});a.each(D,function(c,g){if(g.start&&(g.apply||!g.d&&!X[oa])){G=g.start.split(":");E=g.end.split(":");for(x=0;3>x;x++)void 0===G[x]&&(G[x]=0),void 0===E[x]&&(E[x]=59),G[x]=+G[x],E[x]=+E[x];G.unshift(11<G[0]?1:0);E.unshift(11<E[0]?1:0);Z&&(12<=G[1]&&(G[1]-=12),12<=E[1]&&(E[1]-=12));U=T=!0;a.each($,function(c,g){if(w[g]!==void 0){A=d(q,g);R=Q=O=0;P=void 0;H=a(".dw-ul",b).eq(w[g]);for(x=c+1;x<4;x++){G[x]>
0&&(O=k[g]);E[x]<t[$[x]]&&(Q=k[g])}C=l(G[c]+O,k[g]);J=l(E[c]-Q,k[g]);T&&(R=C<0?0:C>t[g]?a(".dw-li",H).length:y(H,C)+0);U&&(P=J<0?0:J>t[g]?a(".dw-li",H).length:y(H,J)+1);(T||U)&&a(".dw-li",H).slice(R,P).removeClass("dw-v");A=m.getValidCell(A,H,i).val;T=T&&A==l(G[c],k[g]);U=U&&A==l(E[c],k[g]);q[w[g]]=A}})}})}}}};o.i18n.en=a.extend(o.i18n.en,{dateFormat:"mm/dd/yy",dateOrder:"mmddy",timeWheels:"hhiiA",timeFormat:"hh:ii A",monthNames:"January,February,March,April,May,June,July,August,September,October,November,December".split(","),
monthNamesShort:"Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec".split(","),dayNames:"Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday".split(","),dayNamesShort:"Sun,Mon,Tue,Wed,Thu,Fri,Sat".split(","),monthText:"Month",dayText:"Day",yearText:"Year",hourText:"Hours",minuteText:"Minutes",secText:"Seconds",ampmText:"&nbsp;",nowText:"Now"});a.each(["date","time","datetime"],function(a,d){o.presets[d]=C;o.presetShort(d)});o.formatDate=function(m,d,r){if(!d)return null;var r=a.extend({},P,r),
l=function(a){for(var b=0;k+1<m.length&&m.charAt(k+1)==a;)b++,k++;return b},o=function(a,b,d){b=""+b;if(l(a))for(;b.length<d;)b="0"+b;return b},y=function(a,b,d,i){return l(a)?i[b]:d[b]},k,b="",z=!1;for(k=0;k<m.length;k++)if(z)"'"==m.charAt(k)&&!l("'")?z=!1:b+=m.charAt(k);else switch(m.charAt(k)){case "d":b+=o("d",d.getDate(),2);break;case "D":b+=y("D",d.getDay(),r.dayNamesShort,r.dayNames);break;case "o":b+=o("o",(d.getTime()-(new Date(d.getFullYear(),0,0)).getTime())/864E5,3);break;case "m":b+=
o("m",d.getMonth()+1,2);break;case "M":b+=y("M",d.getMonth(),r.monthNamesShort,r.monthNames);break;case "y":b+=l("y")?d.getFullYear():(10>d.getYear()%100?"0":"")+d.getYear()%100;break;case "h":var i=d.getHours(),b=b+o("h",12<i?i-12:0==i?12:i,2);break;case "H":b+=o("H",d.getHours(),2);break;case "i":b+=o("i",d.getMinutes(),2);break;case "s":b+=o("s",d.getSeconds(),2);break;case "a":b+=11<d.getHours()?"pm":"am";break;case "A":b+=11<d.getHours()?"PM":"AM";break;case "'":l("'")?b+="'":z=!0;break;default:b+=
m.charAt(k)}return b};o.parseDate=function(m,d,r){var l=a.extend({},P,r),r=l.defaultValue||new Date;if(!m||!d)return r;var d="object"==typeof d?d.toString():d+"",o=l.shortYearCutoff,y=r.getFullYear(),k=r.getMonth()+1,b=r.getDate(),z=-1,i=r.getHours(),c=r.getMinutes(),g=0,t=-1,A=!1,C=function(a){(a=u+1<m.length&&m.charAt(u+1)==a)&&u++;return a},D=function(a){C(a);a=d.substr(h).match(RegExp("^\\d{1,"+("@"==a?14:"!"==a?20:"y"==a?4:"o"==a?3:2)+"}"));if(!a)return 0;h+=a[0].length;return parseInt(a[0],
10)},ea=function(a,b,c){a=C(a)?c:b;for(b=0;b<a.length;b++)if(d.substr(h,a[b].length).toLowerCase()==a[b].toLowerCase())return h+=a[b].length,b+1;return 0},h=0,u;for(u=0;u<m.length;u++)if(A)"'"==m.charAt(u)&&!C("'")?A=!1:h++;else switch(m.charAt(u)){case "d":b=D("d");break;case "D":ea("D",l.dayNamesShort,l.dayNames);break;case "o":z=D("o");break;case "m":k=D("m");break;case "M":k=ea("M",l.monthNamesShort,l.monthNames);break;case "y":y=D("y");break;case "H":i=D("H");break;case "h":i=D("h");break;case "i":c=
D("i");break;case "s":g=D("s");break;case "a":t=ea("a",["am","pm"],["am","pm"])-1;break;case "A":t=ea("A",["am","pm"],["am","pm"])-1;break;case "'":C("'")?h++:A=!0;break;default:h++}100>y&&(y+=(new Date).getFullYear()-(new Date).getFullYear()%100+(y<=("string"!=typeof o?o:(new Date).getFullYear()%100+parseInt(o,10))?0:-100));if(-1<z){k=1;b=z;do{l=32-(new Date(y,k-1,32)).getDate();if(b<=l)break;k++;b-=l}while(1)}i=new Date(y,k-1,b,-1==t?i:t&&12>i?i+12:!t&&12==i?0:i,c,g);return i.getFullYear()!=y||
i.getMonth()+1!=k||i.getDate()!=b?r:i}})(jQuery);

///#source 1 1 /Styles/mobile-frontend/js/app.datepicker.js
(function($) {
        $.mobiscroll.i18n['current'] = $.extend($.mobiscroll.i18n['current'],
            {
               setText: l10n.fill('form.SetText'),
               cancelText: l10n.fill('form.CancelText'),
               clearText: l10n.fill('form.ClearText'),
               selectedText: l10n.fill('form.SelectedText'),
               dateFormat: l10n.fill('form.MobiDatePickerDateFormat'),
               dateOrder: l10n.fill('form.DateOrder'),
               dayNames: [l10n.fill('form.DayNames.Sunday'), l10n.fill('form.DayNames.Monday'), l10n.fill('form.DayNames.Tuesday'), l10n.fill('form.DayNames.Wednesday'), l10n.fill('form.DayNames.Thursday'), l10n.fill('form.DayNames.Friday'), l10n.fill('form.DayNames.Saturday')],
               dayNamesShort: [l10n.fill('form.DayNamesShort.Sun'), l10n.fill('form.DayNamesShort.Mon'), l10n.fill('form.DayNamesShort.Tue'), l10n.fill('form.DayNamesShort.Wed'), l10n.fill('form.DayNamesShort.Thu'), l10n.fill('form.DayNamesShort.Fri'), l10n.fill('form.DayNamesShort.Sat')],
               dayText: l10n.fill('form.DayText'),
               hourText: l10n.fill('form.HourText'),
               minuteText: l10n.fill('form.MinuteText'),
               monthNames: [l10n.fill('form.MonthNames.January'), l10n.fill('form.MonthNames.February'), l10n.fill('form.MonthNames.March'), l10n.fill('form.MonthNames.April'), l10n.fill('form.MonthNames.May'), l10n.fill('form.MonthNames.June'), l10n.fill('form.MonthNames.July'), l10n.fill('form.MonthNames.August'), l10n.fill('form.MonthNames.September'), l10n.fill('form.MonthNames.October'), l10n.fill('form.MonthNames.November'), l10n.fill('form.MonthNames.December')],
               monthNamesShort: [l10n.fill('form.MonthNamesShort.Jan'), l10n.fill('form.MonthNamesShort.Feb'), l10n.fill('form.MonthNamesShort.Mar'), l10n.fill('form.MonthNamesShort.Apr'), l10n.fill('form.MonthNamesShort.May'), l10n.fill('form.MonthNamesShort.Jun'), l10n.fill('form.MonthNamesShort.Jul'), l10n.fill('form.MonthNamesShort.Aug'), l10n.fill('form.MonthNamesShort.Sep'), l10n.fill('form.MonthNamesShort.Oct'), l10n.fill('form.MonthNamesShort.Nov'), l10n.fill('form.MonthNamesShort.Dec')],
               monthText: l10n.fill('form.MonthText'),
               secText: l10n.fill('form.SecText'),
               timeFormat: l10n.fill('form.TimeFormat'),
               timeWheels: l10n.fill('form.TimeWheels'),
               yearText: l10n.fill('form.YearText'),
               nowText: l10n.fill('form.NowText'),
               dateText: l10n.fill('form.DateText'),
               timeText: l10n.fill('form.TimeText'),
               calendarText: l10n.fill('form.CalendarText'),
               closeText: l10n.fill('form.CloseText'),
               fromText: l10n.fill('form.FromText'),
               toText: l10n.fill('form.ToText'),
               wholeText: l10n.fill('form.WholeText'),
               fractionText: l10n.fill('form.FractionText'),
               unitText: l10n.fill('form.UnitText'),
               labels: [l10n.fill('form.Labels.Years'), l10n.fill('form.Labels.Months'), l10n.fill('form.Labels.Days'), l10n.fill('form.Labels.Hours'), l10n.fill('form.Labels.Minutes'), l10n.fill('form.Labels.Seconds'), ""],
                labelsShort: [l10n.fill('form.LabelsShort.Yrs'), l10n.fill('form.LabelsShort.Mths'), l10n.fill('form.LabelsShort.Days'), l10n.fill('form.LabelsShort.Hrs'), l10n.fill('form.LabelsShort.Mins'), l10n.fill('form.LabelsShort.Secs'), ""],
                startText: l10n.fill('form.StartText'),
                stopText: l10n.fill('form.StopText'),
                resetText: l10n.fill('form.ResetText'),
                lapText: l10n.fill('form.LapText'),
                hideText: l10n.fill('form.HideText')
            }
        );
})(jQuery);

(function () {
    $.fn.cstDatepicker = function(options) {
        return this.each(function () {
            var that = $(this);
            var buttons = ['set', 'cancel'];
            var isFieldRequired = $(that).hasClass('valid');

            if (!isFieldRequired)
                buttons.splice(1, 0, "clear");

            var mobiScrollOptions = $.extend({ preset: 'date' }, {
                theme: $.mobiscroll.defaults.theme,
                mode: 'mixed',
                display: 'modal',
                lang: 'current',
                buttons: buttons
            });

            $(that).mobiscroll(mobiScrollOptions);
        });
    };
}());

(function ($) {
    $(document).ready(function () {
        $('.datepicker').cstDatepicker();
    });
}
(jQuery));


///#source 1 1 /Styles/mobile-frontend/js/app.animations.js
(function (jQuery) {
   jQuery(document).ready(function () {
      var root = jQuery('html, body');
      jQuery("a[href*=#], area[href*=#]").on('click', function (event) {
         var href = jQuery(this).attr("href");
         if (href == "#") {
            return;
         }
         if (/(#.*)/.test(href)) {
            var hash = href.match(/(#.*)/)[0];
            var path = href.match(/([^#]*)/)[0];
            path = path.replace(window.location.origin, '');
            if (path[0] != "/") {
               path = "/" + path;
            }

            if (window.location.pathname == path || path.length == 0) {
               event.preventDefault();
               root.animate({ scrollTop: jQuery(this.hash).offset().top }, 500);
               window.location.hash = hash;
            }
         }
      });
   });

   var isAnimationsDisabled = function () {
      return !(typeof LkPreview === 'undefined') && (LkPreview.dragEnabled || LkPreview.settings.DisableAnimations);
   };

   jQuery(window).load(function () {
      var win = jQuery(window);
      jQuery(window).on('scroll', show);

      function show() {
         if (isAnimationsDisabled()) {
            return;
         }
         var winHeightPadded = win.height();//win.height() * 1.1;
         var isMobile = LkEnv.IsMobile();
         var scrolled = win.scrollTop();
         jQuery('#root > .row-outer, ' +
           '#root > .row-outer > .row-inner > .container, ' +
           '#root > .row-outer > .row-inner > .container > .container-content > .block').each(function () {
              var self = this;
              var item = jQuery(self);

              //Check animation data
              var animationData = getAnimationSettings(item, 'show', true);
              if (!animationData || (isMobile && !animationData.IsMobileEnabled)) {
                 var animationParent = getAnimationParent(item);
                 if (animationParent == null) {
                    return;
                 }

                 animationData = getAnimationSettings(animationParent, 'show', false);
                 if (!animationData || (isMobile && !animationData.IsMobileEnabled)) {
                    return;
                 }
              }

              var offsetTop = item.offset().top;

              if (scrolled + winHeightPadded >= offsetTop && offsetTop >= scrolled) {
                 if (!item.hasClass('animated-show') && !item.hasClass('animated')) {
                    var delay = animationData.Delay;
                    if (delay == 0) {
                       delay = 10;
                    }
                    window.setTimeout(function () {
                       item.addClass('animated-show');
                       item.addClass('animated ' + animationData.Type).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                          jQuery(this).removeClass('animated').removeClass(animationData.Type);
                          if (jQuery(this).css('opacity') == 0) {
                             jQuery(this).css('opacity', 1);
                          }
                       });
                    }, delay);
                 }
              } else {
                 item.removeClass('animated-show');
              }
           });
      }

      if (isAnimationsDisabled()) {
         return;
      }

      show();
   });

   var itemsMouseEnter = null;
   var itemsMouseLeave = null;

   var initHover = function (fRoot) {
      jQuery('#root > .row-outer, ' +
      '#root > .row-outer > .row-inner > .container, ' +
      '#root > .row-outer > .row-inner > .container > .container-content > .block').unbind('mouseenter', itemsMouseEnter);
      jQuery('#root > .row-outer, ' +
            '#root > .row-outer > .row-inner > .container, ' +
            '#root > .row-outer > .row-inner > .container > .container-content > .block').unbind('mouseleave', itemsMouseLeave);

      itemsMouseEnter = function () {
         if (isAnimationsDisabled()) {
            return;
         }

         var self = this;
         var item = jQuery(self);
         var isMobile = LkEnv.IsMobile();

         //Check animation data
         var animationData = getAnimationSettings(item, 'hover', true);
         if (!animationData || (isMobile && !animationData.IsMobileEnabled)) {
            var animationParent = getAnimationParent(item);
            if (animationParent == null) {
               return;
            }

            animationData = getAnimationSettings(animationParent, 'hover', false);
            if (!animationData || (isMobile && !animationData.IsMobileEnabled)) {
               return;
            }
         }

         if (!item.hasClass('animated-hover') && !item.hasClass('animated')) {
            var delay = animationData.Delay;
            if (delay == 0) {
               delay = 10;
            }
            window.setTimeout(function () {
               item.addClass('animated-hover');
               item.addClass('animated ' + animationData.Type).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                  jQuery(this).removeClass('animated').removeClass(animationData.Type);
               });
            }, delay);
         }
      };

      itemsMouseLeave = function () {
         var self = this;
         var item = jQuery(self);

         item.removeClass('animated-hover');
      }

      jQuery('#root > .row-outer, ' +
         '#root > .row-outer > .row-inner > .container, ' +
         '#root > .row-outer > .row-inner > .container > .container-content > .block').mouseenter(itemsMouseEnter);

      jQuery('#root > .row-outer, ' +
         '#root > .row-outer > .row-inner > .container, ' +
         '#root > .row-outer > .row-inner > .container > .container-content > .block').mouseleave(itemsMouseLeave);
   }

   LkExtender.register(initHover);

   var getAnimationSettings = function (fItem, fEvent, fParent) {
      var toReturn = null;
      var prefix = '{0}-{1}'.format(fEvent, fParent ? 'parent' : 'children');
      var animationType = fItem.data('{0}-type'.format(prefix));
      if (animationType) {
         toReturn = {
            Type: animationType,
            Delay: parseInt(fItem.data('{0}-delay'.format(prefix))),
            IsMobileEnabled: fItem.data('{0}-mobile'.format(prefix))
         };
      }
      return toReturn;
   }

   var getAnimationParent = function (fItem) {
      var toReturn = null;
      if (fItem.hasClass('block') || fItem.hasClass('container')) {
         toReturn = fItem.parent().parent();
      }
      return toReturn;
   }
})(jQuery);
///#source 1 1 /Styles/mobile-frontend/js/app.x-script.js
(function (jQuery) {
   jQuery(document).ready(function () {
      LkExtender.extend(jQuery('body'), true);
   });

   jQuery(window).load(function () {
      LkExtender.extend(jQuery('body'), false);
   });
})(jQuery);
