window.onload=function(){var a={type:"classic",maxFileSize:0,maxTotalSize:0,concurrentUploads:3,dropzone:document.getElementById("dropzone-0"),slice:!0,sliceSize:2E3,notification:!1,notificationIcon:"assets/images/logo.svg",autoUpload:!1,uploadButton:!0,grid:!1,thumbnails:!0,maxWidth:0,maxHeight:0};new RealTimeUpload(a,document.getElementById("file"));a={extension:["png","jpg","jpeg","gif"],thumbnails:!0,grid:!0,autoUpload:!1,uploadButton:!0,dropzone:document.getElementById("example-2"),text:"Drag or Select Images to Upload"};
new RealTimeUpload(a,document.getElementById("file-2"));a={thumbnails:!0,grid:!1,autoUpload:!0,dropzone:document.getElementById("example-5"),text:"Select your files",maxTotalSize:2E8,maxFiles:4};new RealTimeUpload(a,document.getElementById("file-3"));links=document.getElementsByClassName("menu-item");for(var a=0,b=links.length;a<b;a++)-1!=links[a].href.indexOf("#")&&("undefined"===typeof links[a].dataset&&(links[a].dataset={}),links[a].dataset.link=links[a].href.substr(links[a].href.indexOf("#")+
1),links[a].addEventListener("click",function(a){null!==document.getElementById(this.dataset.link)&&(a.preventDefault(),demoScroll(document.getElementById(this.dataset.link)));a=0;for(var b=links.length;a<b;a++)links[a].dataset.selected="";this.dataset.selected="true"},!1));elementsList=[document.getElementById("example-1"),document.getElementById("example-2"),document.getElementById("example-3"),document.getElementById("example-4"),document.getElementById("example-5")];window.addEventListener("scroll",
demoMenu,!1);demoMenu()};var elementsList,links;function demoScroll(a){scrollTo(a,1E3)}function demoMenu(){for(var a=0,b=links.length;a<b;a++)links[a].dataset.selected="";a=0;for(b=elementsList.length;a<b;a++)if(null!==elementsList[a]&&inView(elementsList[a])&&"undefined"!==typeof links[a]&&null!==links[a]){links[a].dataset.selected="true";break}}function getPosition(a){for(var b=0,c=0;a;)c+=a.offsetLeft,b+=a.offsetTop,a=a.offsetParent;return{left:c,top:b}}
function inView(a){var b=getPosition(a),c=document.documentElement.scrollTop||document.body.scrollTop;return b.top<=c+document.body.offsetHeight/2&&b.top+a.offsetHeight>=c+document.body.offsetHeight/2?!0:!1}function scrollTo(a,b){var c=document.documentElement;if(0===c.scrollTop){var d=c.scrollTop;++c.scrollTop;c=d+1===c.scrollTop--?c:document.body}scrollToC(c,c.scrollTop,a,b)}
function scrollToC(a,b,c,d){0>d||("object"===typeof b&&(b=b.offsetTop),"object"===typeof c&&(c=c.offsetTop),scrollToX(a,b,c,0,1/d,20,easeOutCuaic))}function scrollToX(a,b,c,d,e,g,f){0>d||1<d||0>=e||(a.scrollTop=b-(b-c)*f(d),d+=e*g,setTimeout(function(){scrollToX(a,b,c,d,e,g,f)},g))}function easeOutCuaic(a){a--;return a*a*a+1}var RealTimeUploadFormsArray=[];
function RealTimeUpload(a,b){if("undefined"===typeof b){var c=document.getElementsByTagName("input");b=[];for(var d=0,e=c.length;d<e;d++)"undefined"!==typeof c[d].type&&"file"==c[d].type&&b.push(c[d])}RealTimeUploadFormsArray.push([a,b]);this.elements=b;this.settings=a;this.initialize()}
RealTimeUpload.prototype={initialize:function(){if(this.elements instanceof Array)for(var a=0,b=this.elements.length;a<b;a++)this.configureUploadElement(this.elements[a],a);else this.configureUploadElement(this.elements,0)},configureUploadElement:function(a,b){a.objects={};a.parameters={text:"Select a file to Upload",method:"POST",action:window.location.href,callbackSuccess:"",callbackError:"",dropzone:void 0,autoUpload:!0,uploadButton:!1,files:0,maxFiles:0,started:0,finished:0,remaining:0,
size:0,maxFileSize:0,maxTotalSize:0,concurrentUploads:3,slice:!0,sliceSize:400,notification:!1,notificationIcon:"",extension:[],grid:!1,thumbnails:!1,maxWidth:0,maxHeight:0};a.uploadList=[];"undefined"!==typeof this.settings.text&&(a.parameters.text=this.settings.text);null!=a.form&&(null!=a.form.getAttribute("method")&&(a.parameters.method=a.form.getAttribute("method")),null!=a.form.getAttribute("action")&&(a.parameters.action=a.form.getAttribute("action")));"undefined"!==typeof this.settings.callbackSuccess&&
""!=this.settings.callbackSuccess&&(a.parameters.callbackSuccess=this.settings.callbackSuccess);"undefined"!==typeof this.settings.callbackError&&""!=this.settings.callbackError&&(a.parameters.callbackError=this.settings.callbackError);"undefined"!==typeof this.settings.dropzone&&(a.parameters.dropzone=this.settings.dropzone);"boolean"!==typeof this.settings.autoUpload||this.settings.autoUpload||(a.parameters.autoUpload=this.settings.autoUpload);"boolean"===typeof this.settings.uploadButton&&this.settings.uploadButton&&
(a.parameters.uploadButton=this.settings.uploadButton);"undefined"===typeof this.settings.maxFiles||isNaN(this.settings.maxFiles)||(a.parameters.maxFiles=this.settings.maxFiles);"undefined"===typeof this.settings.size||isNaN(this.settings.size)||(a.parameters.size=this.settings.size);"undefined"===typeof this.settings.maxFileSize||isNaN(this.settings.maxFileSize)||(a.parameters.maxFileSize=this.settings.maxFileSize);"undefined"===typeof this.settings.maxTotalSize||isNaN(this.settings.maxTotalSize)||
(a.parameters.maxTotalSize=this.settings.maxTotalSize);"undefined"===typeof this.settings.concurrentUploads||isNaN(this.settings.concurrentUploads)||(a.parameters.concurrentUploads=this.settings.concurrentUploads);"boolean"===typeof this.settings.slice&&(a.parameters.slice=this.settings.slice);"undefined"===typeof this.settings.sliceSize||isNaN(this.settings.sliceSize)||(a.parameters.sliceSize=this.settings.sliceSize);"boolean"===typeof this.settings.notification&&this.settings.notification&&(a.parameters.notification=
this.settings.notification,this.askNotificationPermission());"undefined"!==typeof this.settings.notificationIcon&&(a.parameters.notificationIcon=this.settings.notificationIcon);"undefined"!==typeof this.settings.extension&&this.settings.extension instanceof Array&&(a.parameters.extension=this.settings.extension);"boolean"===typeof this.settings.grid&&this.settings.grid&&(a.parameters.grid=this.settings.grid);"boolean"===typeof this.settings.thumbnails&&this.settings.thumbnails&&(a.parameters.thumbnails=
this.settings.thumbnails);"undefined"===typeof this.settings.maxWidth||isNaN(this.settings.maxWidth)||(a.parameters.maxWidth=this.settings.maxWidth);"undefined"===typeof this.settings.maxHeight||isNaN(this.settings.maxHeight)||(a.parameters.maxHeight=this.settings.maxHeight);this.addClass(a,"RTU-hiddenFile");a.objects.uploadContainer=document.createElement("div");a.objects.uploadContainer.className=a.parameters.grid?"RTU-gridContainer":"RTU-uploadContainer";a.objects.uploadLabel=document.createElement("label");
a.objects.uploadLabel.className="RTU-uploadLabel";if("undefined"===typeof a.id||null==a.getAttribute("id"))a.id="RealTimeUpload-"+b+"-"+RealTimeUploadFormsArray.length;a.objects.uploadLabel.htmlFor=a.id;a.objects.uploadLabelImage=document.createElement("div");a.objects.uploadLabelImage.className="RTU-uploadLabelImage";a.objects.uploadLabelText=document.createElement("div");a.objects.uploadLabelText.className="RTU-uploadLabelText";a.objects.uploadLabelText.innerHTML=a.parameters.text;a.objects.uploadLabel.appendChild(a.objects.uploadLabelImage);
a.objects.uploadLabel.appendChild(a.objects.uploadLabelText);a.objects.uploadContainer.appendChild(a.objects.uploadLabel);a.parentNode.insertBefore(a.objects.uploadContainer,a.nextSibling);var c=a.objects.uploadLabel.offsetWidth;!isNaN(c)&&0<c&&(a.objects.uploadContainer.style.width=c+"px");a.objects.uploadItemsList=document.createElement("div");a.objects.uploadItemsList.className="RTU-uploadItemsList";"undefined"===typeof a.objects.uploadItemsList.dataset&&(a.objects.uploadItemsList.dataset={});
a.objects.uploadItemsList.setAttribute("data-upload",0);a.objects.uploadContainer.appendChild(a.objects.uploadItemsList);if(a.parameters.uploadButton){a.objects.uploadButtonHolder=document.createElement("div");a.objects.uploadButtonHolder.className="RTU-uploadButtonHolder";a.objects.uploadButton=document.createElement("div");a.objects.uploadButton.className="RTU-uploadButton";a.objects.uploadButton.innerHTML="Start Upload";a.objects.uploadButtonHolder.appendChild(a.objects.uploadButton);a.objects.uploadContainer.appendChild(a.objects.uploadButtonHolder);
var d=this;a.objects.uploadButton.addEventListener("click",function(){d.prepareUploads(a)},!1)}this.addDropEvent(a)},addDropEvent:function(a){var b=this;a.addEventListener("change",function(c){b.fileAdded(a,c)},!1);a.addEventListener("focus",function(c){b.addClass(a.objects.uploadLabel,"RTU-uploadLabelActive")},!1);a.addEventListener("blur",function(c){b.removeClass(a.objects.uploadLabel,"RTU-uploadLabelActive")},!1);document.addEventListener("dragover",function(c){b.cancelDefaultEvent(c);b.addClass(a.objects.uploadLabel,
"RTU-droppable")},!1);document.addEventListener("dragleave",function(a){b.cancelDefaultEvent(a);b.removeDropBorder()},!1);a.objects.uploadContainer.addEventListener("drop",function(c){b.cancelDefaultEvent(c);b.removeDropBorder();b.fileAdded(a,c)},!1);document.addEventListener("drop",function(a){b.removeDropBorder()},!1);if("undefined"!==typeof a.parameters.dropzone)if(a.parameters.dropzone.constructor===Array)for(var c=0,d=a.parameters.dropzone.length;c<d;c++)a.parameters.dropzone[c].addEventListener("drop",
function(c){b.cancelDefaultEvent(c);b.fileAdded(a,c);b.removeDropBorder()},!1);else a.parameters.dropzone.addEventListener("drop",function(c){b.cancelDefaultEvent(c);b.fileAdded(a,c);b.removeDropBorder()},!1)},removeDropBorder:function(){for(var a=0,b=RealTimeUploadFormsArray.length;a<b;a++)"undefined"!==typeof RealTimeUploadFormsArray[a][1].objects&&"undefined"!==typeof RealTimeUploadFormsArray[a][1].objects.uploadLabel&&this.removeClass(RealTimeUploadFormsArray[a][1].objects.uploadLabel,"RTU-droppable")},
fileAdded:function(a,b){var c=b.target.files||b.dataTransfer.files;if("undefined"!==typeof c)for(var d=0,e;e=c[d];d++){var g=a.uploadList.length;a.uploadList.push({});a.uploadList[g].file=e;this.getFileInformations(a,g);this.addFileToList(a,g)}},getFileInformations:function(a,b){a.uploadList[b].name=a.uploadList[b].file.name;a.uploadList[b].type=a.uploadList[b].file.type;a.uploadList[b].size=a.uploadList[b].file.size;a.uploadList[b].extension=this.fileExtension(a.uploadList[b].file.name);a.uploadList[b].error=
0;a.uploadList[b].status="pending"},addFileToList:function(a,b){var c=this;a.uploadList[b].uploadItem=document.createElement("div");a.uploadList[b].uploadItem.className="RTU-uploadItem";if(a.parameters.thumbnails&&0==a.uploadList[b].type.indexOf("image")){a.uploadList[b].uploadItemIcon=document.createElement("img");var d=new Image;d.onload=function(){var c=document.createElement("canvas"),d=c.getContext("2d");c.height=120;c.width=120;var f=0,f=1>=this.width/this.height?this.width/c.width:this.height/
c.height,h=this.width/f,f=this.height/f;d.drawImage(this,(c.width-h)/2,(c.height-f)/2,h,f);c=c.toDataURL();a.uploadList[b].uploadItemIcon.src=c};d.src=URL.createObjectURL(a.uploadList[b].file)}else a.uploadList[b].uploadItemIcon=document.createElement("div"),a.uploadList[b].uploadItemIcon.innerHTML=a.uploadList[b].extension;a.uploadList[b].uploadItemIcon.className="RTU-uploadItemIcon";a.uploadList[b].uploadItem.appendChild(a.uploadList[b].uploadItemIcon);a.uploadList[b].uploadItemText=document.createElement("div");
a.uploadList[b].uploadItemText.className="RTU-uploadItemText";a.uploadList[b].uploadItemText.innerHTML=a.uploadList[b].name;a.uploadList[b].uploadItem.appendChild(a.uploadList[b].uploadItemText);a.uploadList[b].uploadItemControls=document.createElement("div");a.uploadList[b].uploadItemControls.className="RTU-uploadItemControls";a.uploadList[b].uploadItem.appendChild(a.uploadList[b].uploadItemControls);a.uploadList[b].uploadItemSize=document.createElement("div");a.uploadList[b].uploadItemSize.className=
"RTU-uploadItemSize";a.uploadList[b].uploadItemSize.innerHTML="0 / "+this.sizeConverter(a.uploadList[b].size);a.uploadList[b].uploadItemControls.appendChild(a.uploadList[b].uploadItemSize);a.uploadList[b].controlsContainer=document.createElement("div");a.uploadList[b].controlsContainer.className="RTU-controlsContainer";a.parameters.slice&&(a.uploadList[b].uploadItemPause=document.createElement("div"),a.uploadList[b].uploadItemPause.className="RTU-uploadItemPause RTU-paused",a.uploadList[b].uploadItemPause.title=
"Start Upload",a.uploadList[b].controlsContainer.appendChild(a.uploadList[b].uploadItemPause),a.uploadList[b].uploadItemPause.addEventListener("click",function(){c.switchPause(a,b)},!1));a.uploadList[b].uploadItemCancel=document.createElement("div");a.uploadList[b].uploadItemCancel.className="RTU-uploadItemCancel";a.uploadList[b].uploadItemCancel.title="Cancel upload";a.uploadList[b].controlsContainer.appendChild(a.uploadList[b].uploadItemCancel);a.uploadList[b].uploadItemCancel.addEventListener("click",
function(){c.removeFile(a,b)},!1);a.uploadList[b].uploadItemControls.appendChild(a.uploadList[b].controlsContainer);a.uploadList[b].uploadItemBar=document.createElement("div");a.uploadList[b].uploadItemBar.className="RTU-uploadItemBar";a.uploadList[b].uploadItem.appendChild(a.uploadList[b].uploadItemBar);a.uploadList[b].uploadItemBarUploaded=document.createElement("div");a.uploadList[b].uploadItemBarUploaded.className="RTU-uploadItemBarUploaded";a.uploadList[b].uploadItemBar.appendChild(a.uploadList[b].uploadItemBarUploaded);
a.objects.uploadItemsList.appendChild(a.uploadList[b].uploadItem);a.objects.uploadItemsList.setAttribute("data-upload",parseInt(a.objects.uploadItemsList.dataset.upload)+1);0!=a.uploadList[b].type.indexOf("image")||0==a.parameters.maxWidth&&0==a.parameters.maxHeight?0<a.parameters.extension.length&&-1==a.parameters.extension.indexOf(a.uploadList[b].extension)?this.uploadFailed(a,b,"File extension not allowed: "+a.uploadList[b].extension,0):this.uploadFile(a,b):(c=this,d=new Image,d.onload=function(){0!=
a.parameters.maxWidth&&this.width>a.parameters.maxWidth&&a.uploadList[b].error++;0!=a.parameters.maxHeight&&this.height>a.parameters.maxHeight&&a.uploadList[b].error++;0<a.uploadList[b].error?c.uploadFailed(a,b,"Image cannot exceeds "+a.parameters.maxWidth+"px on "+a.parameters.maxHeight+"px",0):c.uploadFile(a,b)},d.src=URL.createObjectURL(a.uploadList[b].file))},resetElement:function(a,b){a.uploadList[b].uploadItemBarUploaded.className="RTU-uploadItemBarUploaded";a.uploadList[b].uploadItemBarUploaded.style.width=
"0%";a.uploadList[b].uploadItemSize.innerHTML="0 / "+this.sizeConverter(a.uploadList[b].size)},uploadProgress:function(a,b,c){if(b.parameters.slice){var d=parseInt((b.uploadList[c].currentSlice+a.loaded/a.total)/b.uploadList[c].totalSlice*100),d=parseInt(a.loaded/a.total*100);b.uploadList[c].uploadItemBarUploaded.style.width=d+"%";a=b.uploadList[c].currentSlice*b.parameters.sliceSize*1024+a.loaded}else d=parseInt(a.loaded/a.total*100),b.uploadList[c].uploadItemBarUploaded.style.width=d+"%",a=a.loaded;
a>b.uploadList[c].size&&(a=b.uploadList[c].size);b.uploadList[c].uploadItemSize.innerHTML=this.sizeConverter(a)+" / "+this.sizeConverter(b.uploadList[c].size)},uploadSuccess:function(a,b,c){this.validateUpload(a,b,c)},validateUpload:function(a,b,c){a.uploadList[b].status="finished";a.uploadList[b].uploadItemSize.innerHTML=this.sizeConverter(a.uploadList[b].size)+" ";this.addClass(a.uploadList[b].uploadItemBarUploaded,"RTU-uploadItemBarSucceed");"undefined"!==typeof a.uploadList[b].uploadItemPause&&
this.addClass(a.uploadList[b].uploadItemPause,"RTU-done");this.addClass(a.uploadList[b].uploadItemCancel,"RTU-done");if("undefined"!==typeof c.url&&0==a.uploadList[b].controlsContainer.getElementsByClassName("RTU-uploadItemView").length){var d=document.createElement("a");d.title="View";d.className="RTU-uploadItemView";d.href=c.url;d.target="_blank";a.uploadList[b].controlsContainer.appendChild(d);0<navigator.appVersion.toString().indexOf(".NET")&&d.addEventListener("click",function(c){c.preventDefault();
window.navigator.msSaveOrOpenBlob(a.uploadList[b].file,a.uploadList[b].name)},!1)}"function"===typeof a.parameters.callbackSuccess&&a.parameters.callbackSuccess(a,b);a.parameters.notification&&this.showNotification("Upload Successful",a.uploadList[b].name+" has been uploaded",a.parameters.notificationIcon);a.parameters.finished++;this.startUploads(a)},uploadFailed:function(a,b,c,d){this.addClass(a.uploadList[b].uploadItemBarUploaded,"RTU-uploadItemBarFailed");this.addClass(a.uploadList[b].uploadItemPause,
"RTU-done");a.uploadList[b].uploadItemBarUploaded.style.width="100%";a.uploadList[b].uploadItemSize.innerHTML=c;if(0==d)a.uploadList[b].status="rejected";else if(1==d||2==d)a.uploadList[b].status="failed",a.parameters.notification&&this.showNotification("Upload Failed",a.uploadList[b].name+" upload failed",a.parameters.notificationIcon);"function"===typeof a.parameters.callbackError&&a.parameters.callbackError(a,b,c)},uploadFile:function(a,b){a.uploadList[b].xhr=new XMLHttpRequest;a.uploadList[b].file.mozSlice?
(a.uploadList[b].sliced=!0,a.uploadList[b].sliceMethod="mozSlice"):a.uploadList[b].file.webkitSlice?(a.uploadList[b].sliced=!0,a.uploadList[b].sliceMethod="webkitSlice"):a.uploadList[b].file.slice?(a.uploadList[b].sliced=!0,a.uploadList[b].sliceMethod="slice"):(a.uploadList[b].chunk=a.uploadList[b].file,a.uploadList[b].sliced=!1);this.sliceFile(a,b);this.uploadEvents(a,b);a.uploadList[b].file.size<=a.parameters.maxFileSize||0>=a.parameters.maxFileSize?a.parameters.size+a.uploadList[b].file.size<=
a.parameters.maxTotalSize||0>=a.parameters.maxTotalSize?a.parameters.files+1<=a.parameters.maxFiles||0>=a.parameters.maxFiles?(a.parameters.size+=a.uploadList[b].file.size,a.parameters.files++,a.uploadList[b].xhr.open(a.parameters.method,a.parameters.action,!0),a.parameters.autoUpload&&(a.uploadList[b].status="awaiting",this.startUploads(a,b))):this.uploadFailed(a,b,"Maximum number of files reached (max "+a.parameters.maxFiles+" files)",0):this.uploadFailed(a,b,"Total size allowed reached",0):this.uploadFailed(a,
b,"File is too big (max "+this.sizeConverter(a.parameters.maxFileSize)+")",0)},uploadEvents:function(a,b){var c=this;a.uploadList[b].xhr.upload.addEventListener("progress",function(d){c.uploadProgress(d,a,b)},!1);a.uploadList[b].xhr.addEventListener("error",function(a){},!1);a.uploadList[b].xhr.addEventListener("abort",function(a){},!1);a.uploadList[b].xhr.onreadystatechange=function(){if(4==a.uploadList[b].xhr.readyState)if(200==a.uploadList[b].xhr.status||0==a.uploadList[b].xhr.status){a.uploadList[b].onreadystatechange=
null;try{var d=JSON.parse(a.uploadList[b].xhr.responseText);"undefined"!==typeof d.error?c.uploadFailed(a,b,d.error,1):"undefined"!==typeof d.status?c.uploadSuccess(a,b,d):c.uploadFailed(a,b,"A server error has occured",2)}catch(e){c.uploadFailed(a,b,"A server error has occured",2)}}else c.uploadFailed(a,b,a.uploadList[b].xhr.responseText,2)}.bind(this)},prepareUploads:function(a){for(var b=0,c=a.uploadList.length;b<c;b++)"pending"==a.uploadList[b].status&&(a.uploadList[b].status="awaiting",this.startUploads(a,
b))},startUploads:function(a,b){a.value="";if(a.parameters.slice)if("undefined"!==typeof b){if(0==a.parameters.concurrentUploads||a.parameters.concurrentUploads>a.parameters.started-a.parameters.finished)a.parameters.started++,this.uploadSlice(a,b)}else for(var c=0,d=a.uploadList.length;c<d;c++)"undefined"!==typeof a.uploadList[c].status&&"awaiting"==a.uploadList[c].status&&(0==a.parameters.concurrentUploads||a.parameters.concurrentUploads>a.parameters.started-a.parameters.finished)&&(a.parameters.started++,
this.uploadSlice(a,c));else if("undefined"!==typeof b)(0==a.parameters.concurrentUploads||a.parameters.concurrentUploads>a.parameters.started-a.parameters.finished)&&this.upload(a,b);else for(c=0,d=a.uploadList.length;c<d;c++)"pending"==a.uploadList[c].status&&(a.uploadList[c].status="awaiting"),(0==a.parameters.concurrentUploads||a.parameters.concurrentUploads>a.parameters.started-a.parameters.finished)&&this.upload(a,c)},demoUpload:function(a,b){var c=this;"undefined"===typeof a.uploadList[b].already&&
(a.uploadList[b].already=0);"paused"!=a.uploadList[b].status&&(a.uploadList[b].already+=Math.round(a.uploadList[b].size/(a.uploadList[b].size/3E5)));if(a.uploadList[b].size<=a.uploadList[b].already){if(window.URL&&window.Blob)if(0<navigator.appVersion.toString().indexOf(".NET"))var d={url:"#"};else{var e=URL.createObjectURL(a.uploadList[b].file),d={};d.url=e}else d={};c.uploadSuccess(a,b,d)}else d={},d.loaded=a.uploadList[b].already,d.total=a.uploadList[b].size,c.uploadProgress(d,a,b),setTimeout(function(){c.demoUpload(a,
b)},Math.floor(401*Math.random())+100)},upload:function(a,b){"undefined"!==typeof a.uploadList[b].status&&"awaiting"==a.uploadList[b].status&&("undefined"!==window.FormData?(a.uploadList[b].formData=new FormData,a.uploadList[b].formData.append("file",a.uploadList[b].file)):a.uploadList[b].xhr.setRequestHeader("X-FILENAME",a.uploadList[b].name),this.demoUpload(a,b),a.uploadList[b].status="started")},switchPause:function(a,b){"started"==a.uploadList[b].status?(a.uploadList[b].status="paused",this.addClass(a.uploadList[b].uploadItemPause,
"RTU-paused"),a.uploadList[b].uploadItemPause.title="Continue Upload"):"paused"==a.uploadList[b].status?(a.uploadList[b].status="started",this.removeClass(a.uploadList[b].uploadItemPause,"RTU-paused"),a.uploadList[b].uploadItemPause.title="Pause Upload",this.sliceUploaded(a,b)):"pending"==a.uploadList[b].status&&(a.uploadList[b].status="awaiting",this.startUploads(a,b),this.removeClass(a.uploadList[b].uploadItemPause,"RTU-paused"),a.uploadList[b].uploadItemPause.title="Pause Upload")},sliceFile:function(a,
b){a.uploadList[b].slices=[];a.uploadList[b].currentSlice=0;a.uploadList[b].totalSlice=0;for(var c=1024*a.parameters.sliceSize,d=a.uploadList[b].size%c,e=(a.uploadList[b].size-d)/c,g=0;g<e;g++){var f={};f.start=g*c;f.end=(g+1)*c;f.status=0;a.uploadList[b].slices.push(f)}0!=d&&(f={},f.start=e*c,f.end=a.uploadList[b].size,f.status=0,a.uploadList[b].slices.push(f));a.uploadList[b].totalSlice=a.uploadList[b].slices.length},uploadSlice:function(a,b){var c=a.uploadList[b].currentSlice,d=a.uploadList[b].sliceMethod,
c=a.uploadList[b].file[d](a.uploadList[b].slices[c].start,a.uploadList[b].slices[c].end);"canceled"==a.uploadList[b].status&&(a.uploadList[b].xhr=new XMLHttpRequest,a.uploadList[b].xhr.open(a.parameters.method,a.parameters.action,!0),a.uploadList[b].xhr.setRequestHeader("X-REMOVE",!0),c=a.uploadList[b].file[d](0,1));a.uploadList[b].xhr.setRequestHeader("X-FILENAME",a.uploadList[b].name);a.uploadList[b].xhr.setRequestHeader("X-FILESIZE",a.uploadList[b].size);"undefined"!==window.FormData&&(a.uploadList[b].formData=
new FormData,a.uploadList[b].formData.append("file",c));this.demoUpload(a,b);a.uploadList[b].status="started";this.removeClass(a.uploadList[b].uploadItemPause,"RTU-paused");a.uploadList[b].uploadItemPause.title="Pause Upload"},sliceUploaded:function(a,b,c){},removeFile:function(a,b){"undefined"!==typeof a.uploadList[b].xhr&&a.uploadList[b].xhr.abort();this.removeElement(a.uploadList[b].uploadItem);a.objects.uploadItemsList.setAttribute("data-upload",parseInt(a.objects.uploadItemsList.dataset.upload)-
1);a.uploadList[b].status="canceled";"rejected"!=a.uploadList[b].status&&(a.parameters.files--,this.refreshList(a))},refreshList:function(a){if(0<a.parameters.maxFiles)for(var b=0,c=a.uploadList.length;b<c;b++)"undefined"!==typeof a.uploadList[b].status&&"rejected"==a.uploadList[b].status&&(0<a.parameters.extension.length&&-1==a.parameters.extension.indexOf(a.uploadList[b].extension)?this.uploadFailed(a,b,"File extension not allowed: "+a.uploadList[b].extension,0):(a.uploadList[b].status="pending",
this.removeClass(a.uploadList[b].uploadItemPause,"RTU-done"),this.resetElement(a,b),this.uploadFile(a,b)))},fileExtension:function(a){return a.substr(a.lastIndexOf(".")+1).toLowerCase()},sizeConverter:function(a){if(0==a)return"0 Byte";var b=parseInt(Math.floor(Math.log(a)/Math.log(1024)));return Math.round(a/Math.pow(1024,b),2)+" "+["Bytes","KB","MB","GB","TB"][b]},cancelDefaultEvent:function(a){a.stopPropagation();a.preventDefault()},askNotificationPermission:function(){"Notification"in window&&
"denied"!==Notification.permission&&Notification.requestPermission(function(a){"permission"in Notification||(Notification.permission=a)})},showNotification:function(a,b,c){if("Notification"in window&&"denied"!==Notification.permission&&"undefined"!==typeof b){var d="undefined"!==typeof c&&""!==c?{icon:c,body:b}:{body:b};"granted"===Notification.permission?(c="undefined"!==typeof a&&""!=a?new Notification(a,d):new Notification(b),setTimeout(c.close.bind(c),5E3)):Notification.requestPermission(function(c){"permission"in
Notification||(Notification.permission=c);c="undefined"!==typeof a&&""!=a?new Notification(a,d):new Notification(b);setTimeout(c.close.bind(c),5E3)})}},removeElement:function(a){return"undefined"!==typeof a.parentNode?(a.parentNode.removeChild(a),!0):!1},addClass:function(a,b){for(var c=b.split(" "),d=0,e=c.length;d<e;d++)this.hasClass(a,c[d])||(a.className=a.className+" "+c[d])},removeClass:function(a,b){for(var c=a.className,d=b.split(" "),e=0,g=d.length;e<g;e++)this.hasClass(a,d[e])&&(c=(" "+c+
" ").replace(" "+d[e]+" "," "));c=c.replace(/ {2,}/g," ");a.className=c},hasClass:function(a,b){return"undefined"!==typeof a?-1<(" "+a.className+" ").indexOf(" "+b+" "):!1},start:function(){if("undefined"!==typeof this.elements&&0<this.elements.length)for(var a=0,b=this.elements.length;a<b;a++)this.startUploads(this.elements[a])},pause:function(){if("undefined"!==typeof this.elements&&0<this.elements.length)for(var a=0,b=this.elements.length;a<b;a++)if("undefined"!==typeof this.elements[a].uploadList&&
0<this.elements[a].uploadList.length)for(var c=0,d=this.elements[a].uploadList.length;c<d;c++)"started"==this.elements[a].uploadList[c].status&&this.switchPause(this.elements[a],c)},stop:function(a){"undefined"===typeof a&&(a="Stopped");if("undefined"!=typeof this.elements&&0<this.elements.length)for(var b=0,c=this.elements.length;b<c;b++)if("undefined"!==typeof this.elements[b].uploadList&&0<this.elements[b].uploadList.length)for(var d=0,e=this.elements[b].uploadList.length;d<e;d++)"undefined"!==
typeof this.elements[b].uploadList[d].xhr&&this.elements[b].uploadList[d].xhr.abort(),this.elements[b].uploadList[d].status="canceled",this.uploadFailed(this.elements[b],d,a,1)},clear:function(){if("undefined"!=typeof this.elements&&0<this.elements.length)for(var a=0,b=this.elements.length;a<b;a++)if("undefined"!==typeof this.elements[a].uploadList&&0<this.elements[a].uploadList.length)for(var c=0,d=this.elements[a].uploadList.length;c<d;c++)this.removeFile(this.elements[a],c)}};