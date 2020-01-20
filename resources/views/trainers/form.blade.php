<div class="form-group">
    <label for="" class="mt-5">
        Nombre
    </label>
    <input type="text", name="name" value="{{isset($trainer) ? $trainer->name : ''}}"class="form-control">
</div>
<div class="form-group">
    <label for="">
        Slug
    </label>
    <input type="text", name="slug" value="{{isset($trainer) ? $trainer->slug : ''}}"class="form-control">
</div>    
<div class="form-group">
    <label for="">
        Avatar
    </label>
    <input type="file", name="avatar">
</div>