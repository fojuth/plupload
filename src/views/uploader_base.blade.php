<div id="{{ $prefix }}_container">
  <button type="button" id="{{ $browse_button_id }}" class="btn btn-primary">Browse...</button>
  <button type="button" id="{{ $prefix }}_start-upload" class="btn btn-success">Upload</button>
</div>

<div id="drop_area" class="well text-center text-primary" style="width: 300px; height: 60px; padding-top: 55px; background: #f0f0f0;">
  <strong>Drop some files here!</strong>
</div>

<ul id="{{ $prefix }}_filelist"></ul>

<pre id="{{ $prefix }}_console"></pre>

<script type="text/javascript" src="{{ url() }}/packages/fojuth/plupload/assets/js/plupload.full.min.js"></script>
<script type="text/javascript">
var {{ $prefix }}_uploader = new plupload.Uploader({
	runtimes : 'html5,flash,silverlight,html4',
  browse_button: '{{ $browse_button_id }}', // this can be an id of a DOM element or the DOM element itself
  container: '{{ $prefix }}_container',
  drop_element: 'drop_area',
  max_file_size : '{{ $max_file_size }}',
	url: '{{ $handler_gate }}',
	flash_swf_url : '../js/Moxie.swf',
	silverlight_xap_url : '../js/Moxie.xap'
});

{{ $prefix }}_uploader.init();

{{ $prefix }}_uploader.bind('FilesAdded', function(up, files) {
	var html = '';
  
	plupload.each(files, function(file) {
		html += '<li id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></li>';
	});
  
	document.getElementById('{{ $prefix }}_filelist').innerHTML += html;
});

{{ $prefix }}_uploader.bind('UploadProgress', function(up, file) {
	document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
});

{{ $prefix }}_uploader.bind('Error', function(up, err) {
	document.getElementById('{{ $prefix }}_console').innerHTML += "\nError #" + err.code + ": " + err.message;
});

document.getElementById('{{ $prefix }}_start-upload').onclick = function() {
	{{ $prefix }}_uploader.start();
};
</script>
