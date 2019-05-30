<section>
	<label class="label"><?php echo $title . ($need ? " <font color='red'>★</font>" : "") ?></label>

	<div class="inline-group">
		<?php foreach ($data as $k => $v): ?>
			<label class="checkbox">
				<input type="checkbox" value="<?php echo $k ?>"<?php if (in_array($k, $val)) {
					echo " checked";
				} ?> name="<?php echo $name ?>"><i></i><?php echo htmlentities($v, ENT_QUOTES, "UTF-8") ?>
			</label>
		<?php endforeach ?>
	</div>
	<?php if ($note): ?>
		<div class="note">
			<?php echo $note ?>
		</div>
	<?php endif ?>
</section>