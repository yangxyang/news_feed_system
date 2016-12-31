<option value="">--</option>
<?php foreach ($celebrities as $celeb):?>
    <option value="<?=$celeb->celeb_id?>"><?=$celeb->first_name?> <?=$celeb->last_name?></option>
<?php endforeach; ?>