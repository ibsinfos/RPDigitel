<div class="form-group">
  <label class="col-sm-3 control-label">
    <?php echo get_phrase('title'); ?>
  </label>
  <div class="col-sm-9">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-circle"></i></span>
      <input type="text" class="form-control" name="title" id="title"
        value="<?php echo $info['title'];?>">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label">
    <?php echo get_phrase('description'); ?>
  </label>
  <div class="col-sm-9">
    <textarea rows="8" class="form-control" name="description" id="description" style="resize: vertical;"><?php echo $info['description']; ?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label">
    <?php echo get_phrase('thumbnail'); ?>
  </label>
  <div class="col-sm-9">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
      <input type="text" class="form-control" name="thumbnail" id="thumbnail"
        value="<?php echo $info['thumbnail'];?>">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label">
    <?php echo get_phrase('thumbnail_preview'); ?>
  </label>
  <div class="col-sm-9">
    <div class="show_thumbnail">
      <img src="<?php echo $info['thumbnail'];?>" alt="" height="90" width="120">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label">
    <?php echo get_phrase('duration'); ?>
  </label>
  <div class="col-sm-9">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
      <input type="text" class="form-control" name="duration" id="duration"
        value="<?php echo $info['duration'];?>">
    </div>
  </div>
</div>
