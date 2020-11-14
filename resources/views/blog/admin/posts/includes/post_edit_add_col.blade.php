<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-dark" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                ID: {{ $item->id }}
            </div>
        </div>
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="created_at">Создано</label>
                    <input type="text" class="form-control" id="created_at" name="created_at" value="{{$item->created_at}}" disabled>
                </div>
                <div class="form-group">
                    <label for="updated_at">Изменино</label>
                    <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{$item->updated_at}}" disabled>
                </div>
                <div class="form-group">
                    <label for="published_at">Опубликовано</label>
                    <input type="text" class="form-control" id="published_at" name="published_at" value="{{$item->published_at}}" disabled>
                </div>
            </div>
        </div>
    </div>
</div>
