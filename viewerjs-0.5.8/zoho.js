/*
 * jQuery.zohoViewer - Embed linked documents using ZOHO Viewer
 * Licensed under MIT license.
 * Date: 2011/01/20
 *
 * @author Jawish Hameed
 * @version 1.0
 */
 (function(a){a.fn.zohoViewer=function(b){var c={width:"600",height:"700"};if(b){a.extend(c,b)}return this.each(function(){var d=a(this).attr("href");var e=d.substring(d.lastIndexOf(".")+1);if(/^(doc|docx|xls|xlsx|ppt|pptx|pps|odt|ods|odp|sxw|sxc|sxi|wpd|pdf|rtf|txt|html|csv|tsv)$/.test(e)){a(this).after(function(){var g=a(this).attr("id");var f=(typeof g!=="undefined"&&g!==false)?g+"-zohoviewer":"";return'<div id="'+f+'" class="zohoviewer"><iframe src="http://viewer.zoho.com/docs/urlview.do?embed=true&url='+encodeURIComponent(d)+'" width="'+c.width+'" height="'+c.height+'" style="border: none;"></iframe></div>'})}})}})(jQuery);