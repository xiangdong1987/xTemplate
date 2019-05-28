<section id="contentArea">
	<label class="label"><?php echo $title . ($need ? " <font color='red'>★</font>" : "") ?></label>
	<label style="padding-left: 5px;padding-right: 20px;">
		<script id="editor" name="<?php echo isset($name) ? $name : ""; ?>" type="text/plain"
				style="width:auto;height:500px;"></script>
	</label>
</section>
<script>
	var ue = UE.getEditor('editor', {
		toolbars: [
			[
				'fullscreen', 'source', 'link', 'unlink', 'simpleupload','insertimage', 'undo', 'redo', '|', 'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
				'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
				'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify'
			],
			['xvideo', 'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
		],
		initialContent: '<?php echo isset($content) ? $content : ""; ?>'
	});
</script>