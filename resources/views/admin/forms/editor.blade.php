<div class="form-group">
    <label class="col-xs-12 control-label" style="text-align: center" for="{{ $name }}">{{ $label }}</label>
    <div class="col-xs-12">
        <textarea name="{{ $name }}" class="ckeditor">{{ $value }}</textarea>
    </div>
</div>

<script>
    $(function(){
        $('.ckeditor').ckeditor();
    });
</script>