
var OGVDecoderVideoAV1W = (() => {
  var _scriptDir = typeof document !== 'undefined' && document.currentScript ? document.currentScript.src : undefined;
  if (typeof __filename !== 'undefined') _scriptDir = _scriptDir || __filename;
  return (
function(OGVDecoderVideoAV1W) {
  OGVDecoderVideoAV1W = OGVDecoderVideoAV1W || {};


var a;a||(a=typeof OGVDecoderVideoAV1W !== 'undefined' ? OGVDecoderVideoAV1W : {});var aa,q;a.ready=new Promise(function(b,c){aa=b;q=c});var ba=a,ca=Object.assign({},a),da="object"==typeof window,r="function"==typeof importScripts,A="",ea,F,G,fs,I,fa;
if("object"==typeof process&&"object"==typeof process.versions&&"string"==typeof process.versions.node)A=r?require("path").dirname(A)+"/":__dirname+"/",fa=()=>{I||(fs=require("fs"),I=require("path"))},ea=function(b,c){fa();b=I.normalize(b);return fs.readFileSync(b,c?void 0:"utf8")},G=b=>{b=ea(b,!0);b.buffer||(b=new Uint8Array(b));return b},F=(b,c,f)=>{fa();b=I.normalize(b);fs.readFile(b,function(d,e){d?f(d):c(e.buffer)})},1<process.argv.length&&process.argv[1].replace(/\\/g,"/"),process.argv.slice(2),
process.on("unhandledRejection",function(b){throw b;}),a.inspect=function(){return"[Emscripten Module object]"};else if(da||r)r?A=self.location.href:"undefined"!=typeof document&&document.currentScript&&(A=document.currentScript.src),_scriptDir&&(A=_scriptDir),0!==A.indexOf("blob:")?A=A.substr(0,A.replace(/[?#].*/,"").lastIndexOf("/")+1):A="",ea=b=>{var c=new XMLHttpRequest;c.open("GET",b,!1);c.send(null);return c.responseText},r&&(G=b=>{var c=new XMLHttpRequest;c.open("GET",b,!1);c.responseType=
"arraybuffer";c.send(null);return new Uint8Array(c.response)}),F=(b,c,f)=>{var d=new XMLHttpRequest;d.open("GET",b,!0);d.responseType="arraybuffer";d.onload=()=>{200==d.status||0==d.status&&d.response?c(d.response):f()};d.onerror=f;d.send(null)};var ha=a.print||console.log.bind(console),J=a.printErr||console.warn.bind(console);Object.assign(a,ca);ca=null;var K;a.wasmBinary&&(K=a.wasmBinary);var noExitRuntime=a.noExitRuntime||!0;"object"!=typeof WebAssembly&&M("no native wasm support detected");
var N,ia=!1,ja="undefined"!=typeof TextDecoder?new TextDecoder("utf8"):void 0,ka,O,P;function la(){var b=N.buffer;ka=b;a.HEAP8=new Int8Array(b);a.HEAP16=new Int16Array(b);a.HEAP32=P=new Int32Array(b);a.HEAPU8=O=new Uint8Array(b);a.HEAPU16=new Uint16Array(b);a.HEAPU32=new Uint32Array(b);a.HEAPF32=new Float32Array(b);a.HEAPF64=new Float64Array(b)}var ma,na=[],oa=[],pa=[];function qa(){var b=a.preRun.shift();na.unshift(b)}var Q=0,ra=null,R=null;a.preloadedImages={};a.preloadedAudios={};
function M(b){if(a.onAbort)a.onAbort(b);b="Aborted("+b+")";J(b);ia=!0;b=new WebAssembly.RuntimeError(b+". Build with -s ASSERTIONS=1 for more info.");q(b);throw b;}function sa(){return S.startsWith("data:application/octet-stream;base64,")}var S;S="ogv-decoder-video-av1-wasm.wasm";if(!sa()){var ta=S;S=a.locateFile?a.locateFile(ta,A):A+ta}function ua(){var b=S;try{if(b==S&&K)return new Uint8Array(K);if(G)return G(b);throw"both async and sync fetching of the wasm failed";}catch(c){M(c)}}
function va(){if(!K&&(da||r)){if("function"==typeof fetch&&!S.startsWith("file://"))return fetch(S,{credentials:"same-origin"}).then(function(b){if(!b.ok)throw"failed to load wasm binary file at '"+S+"'";return b.arrayBuffer()}).catch(function(){return ua()});if(F)return new Promise(function(b,c){F(S,function(f){b(new Uint8Array(f))},c)})}return Promise.resolve().then(function(){return ua()})}
function wa(b){for(;0<b.length;){var c=b.shift();if("function"==typeof c)c(a);else{var f=c.B;"number"==typeof f?void 0===c.s?Ia(f)():Ia(f)(c.s):f(void 0===c.s?null:c.s)}}}var T=[];function Ia(b){var c=T[b];c||(b>=T.length&&(T.length=b+1),T[b]=c=ma.get(b));return c}
var Ja=[null,[],[]],Ka={f:function(){M("")},e:function(b,c,f){O.copyWithin(b,c,c+f)},c:function(b){var c=O.length;b>>>=0;if(2147483648<b)return!1;for(var f=1;4>=f;f*=2){var d=c*(1+.2/f);d=Math.min(d,b+100663296);var e=Math;d=Math.max(b,d);e=e.min.call(e,2147483648,d+(65536-d%65536)%65536);a:{try{N.grow(e-ka.byteLength+65535>>>16);la();var g=1;break a}catch(w){}g=void 0}if(g)return!0}return!1},d:function(){return 0},b:function(){},a:function(b,c,f,d){for(var e=0,g=0;g<f;g++){var w=P[c>>2],u=P[c+4>>
2];c+=8;for(var y=0;y<u;y++){var n=O[w+y],x=Ja[b];if(0===n||10===n){n=1===b?ha:J;var l=x;for(var p=0,t=p+NaN,v=p;l[v]&&!(v>=t);)++v;if(16<v-p&&l.buffer&&ja)l=ja.decode(l.subarray(p,v));else{for(t="";p<v;){var h=l[p++];if(h&128){var B=l[p++]&63;if(192==(h&224))t+=String.fromCharCode((h&31)<<6|B);else{var U=l[p++]&63;h=224==(h&240)?(h&15)<<12|B<<6|U:(h&7)<<18|B<<12|U<<6|l[p++]&63;65536>h?t+=String.fromCharCode(h):(h-=65536,t+=String.fromCharCode(55296|h>>10,56320|h&1023))}}else t+=String.fromCharCode(h)}l=
t}n(l);x.length=0}else x.push(n)}e+=u}P[d>>2]=e;return 0},g:function(b,c,f,d,e,g,w,u,y,n,x,l,p,t,v,h){function B(H,k,C,xa,ya,za,Ma,Na,V){H.set(new Uint8Array(U,k,C*xa));var D,z;for(D=z=0;D<za;D++,z+=C)for(k=0;k<C;k++)H[z+k]=V;for(;D<za+Na;D++,z+=C){for(k=0;k<ya;k++)H[z+k]=V;for(k=ya+Ma;k<C;k++)H[z+k]=V}for(;D<xa;D++,z+=C)for(k=0;k<C;k++)H[z+k]=V;return H}var U=N.buffer,m=a.videoFormat,Aa=(p&-2)*y/w,Ba=(t&-2)*n/u,Ca=x*y/w,Da=l*n/u;x===m.cropWidth&&l===m.cropHeight&&(v=m.displayWidth,h=m.displayHeight);
for(var Ea=a.recycledFrames,E,Fa=u*c,Ga=n*d,Ha=n*g;0<Ea.length;){var L=Ea.shift();m=L.format;if(m.width===w&&m.height===u&&m.chromaWidth===y&&m.chromaHeight===n&&m.cropLeft===p&&m.cropTop===t&&m.cropWidth===x&&m.cropHeight===l&&m.displayWidth===v&&m.displayHeight===h&&L.y.bytes.length===Fa&&L.u.bytes.length===Ga&&L.v.bytes.length===Ha){E=L;break}}E||(E={format:{width:w,height:u,chromaWidth:y,chromaHeight:n,cropLeft:p,cropTop:t,cropWidth:x,cropHeight:l,displayWidth:v,displayHeight:h},y:{bytes:new Uint8Array(Fa),
stride:c},u:{bytes:new Uint8Array(Ga),stride:d},v:{bytes:new Uint8Array(Ha),stride:g}});B(E.y.bytes,b,c,u,p,t,x,l,0);B(E.u.bytes,f,d,n,Aa,Ba,Ca,Da,128);B(E.v.bytes,e,g,n,Aa,Ba,Ca,Da,128);a.frameBuffer=E}};
(function(){function b(e){a.asm=e.exports;N=a.asm.h;la();ma=a.asm.p;oa.unshift(a.asm.i);Q--;a.monitorRunDependencies&&a.monitorRunDependencies(Q);0==Q&&(null!==ra&&(clearInterval(ra),ra=null),R&&(e=R,R=null,e()))}function c(e){b(e.instance)}function f(e){return va().then(function(g){return WebAssembly.instantiate(g,d)}).then(function(g){return g}).then(e,function(g){J("failed to asynchronously prepare wasm: "+g);M(g)})}var d={a:Ka};Q++;a.monitorRunDependencies&&a.monitorRunDependencies(Q);if(a.instantiateWasm)try{return a.instantiateWasm(d,
b)}catch(e){return J("Module.instantiateWasm callback failed with error: "+e),!1}(function(){return K||"function"!=typeof WebAssembly.instantiateStreaming||sa()||S.startsWith("file://")||"function"!=typeof fetch?f(c):fetch(S,{credentials:"same-origin"}).then(function(e){return WebAssembly.instantiateStreaming(e,d).then(c,function(g){J("wasm streaming compile failed: "+g);J("falling back to ArrayBuffer instantiation");return f(c)})})})().catch(q);return{}})();
a.___wasm_call_ctors=function(){return(a.___wasm_call_ctors=a.asm.i).apply(null,arguments)};a._ogv_video_decoder_init=function(){return(a._ogv_video_decoder_init=a.asm.j).apply(null,arguments)};a._ogv_video_decoder_async=function(){return(a._ogv_video_decoder_async=a.asm.k).apply(null,arguments)};a._ogv_video_decoder_destroy=function(){return(a._ogv_video_decoder_destroy=a.asm.l).apply(null,arguments)};
a._ogv_video_decoder_process_header=function(){return(a._ogv_video_decoder_process_header=a.asm.m).apply(null,arguments)};a._ogv_video_decoder_process_frame=function(){return(a._ogv_video_decoder_process_frame=a.asm.n).apply(null,arguments)};a._free=function(){return(a._free=a.asm.o).apply(null,arguments)};a._malloc=function(){return(a._malloc=a.asm.q).apply(null,arguments)};var W;R=function La(){W||Oa();W||(R=La)};
function Oa(){function b(){if(!W&&(W=!0,a.calledRun=!0,!ia)){wa(oa);aa(a);if(a.onRuntimeInitialized)a.onRuntimeInitialized();if(a.postRun)for("function"==typeof a.postRun&&(a.postRun=[a.postRun]);a.postRun.length;){var c=a.postRun.shift();pa.unshift(c)}wa(pa)}}if(!(0<Q)){if(a.preRun)for("function"==typeof a.preRun&&(a.preRun=[a.preRun]);a.preRun.length;)qa();wa(na);0<Q||(a.setStatus?(a.setStatus("Running..."),setTimeout(function(){setTimeout(function(){a.setStatus("")},1);b()},1)):b())}}a.run=Oa;
if(a.preInit)for("function"==typeof a.preInit&&(a.preInit=[a.preInit]);0<a.preInit.length;)a.preInit.pop()();Oa();var X,Pa,Y;"undefined"===typeof performance||"undefined"===typeof performance.now?Y=Date.now:Y=performance.now.bind(performance);function Z(b){var c=Y();b=b();a.cpuTime+=Y()-c;return b}a.loadedMetadata=!!ba.videoFormat;a.videoFormat=ba.videoFormat||null;a.frameBuffer=null;a.cpuTime=0;Object.defineProperty(a,"processing",{get:function(){return!1}});
a.init=function(b){Z(function(){a._ogv_video_decoder_init()});b()};a.processHeader=function(b,c){var f=Z(function(){var d=b.byteLength;X&&Pa>=d||(X&&a._free(X),Pa=d,X=a._malloc(Pa));var e=X;(new Uint8Array(N.buffer,e,d)).set(new Uint8Array(b));return a._ogv_video_decoder_process_header(e,d)});c(f)};a.A=[];
a.processFrame=function(b,c){function f(u){a._free(g);c(u)}var d=a._ogv_video_decoder_async(),e=b.byteLength,g=a._malloc(e);d&&a.A.push(f);var w=Z(function(){(new Uint8Array(N.buffer,g,e)).set(new Uint8Array(b));return a._ogv_video_decoder_process_frame(g,e)});d||f(w)};a.close=function(){};a.sync=function(){a._ogv_video_decoder_async()&&(a.A.push(function(){}),Z(function(){a._ogv_video_decoder_process_frame(0,0)}))};a.recycledFrames=[];
a.recycleFrame=function(b){var c=a.recycledFrames;c.push(b);16<c.length&&c.shift()};


  return OGVDecoderVideoAV1W.ready
}
);
})();
if (typeof exports === 'object' && typeof module === 'object')
  module.exports = OGVDecoderVideoAV1W;
else if (typeof define === 'function' && define['amd'])
  define([], function() { return OGVDecoderVideoAV1W; });
else if (typeof exports === 'object')
  exports["OGVDecoderVideoAV1W"] = OGVDecoderVideoAV1W;
