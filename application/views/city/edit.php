<div class="right_col" role="main">
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4>Edit kota</h4>
        </div>
        <div class="col-md-7 p-3">
            <form action="<?= base_url() ?>city/edit/<?= $city['id']?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" value="<?= $city['city'] ?>" name="city">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <input type="hidden" value="<?= $city['id'] ?>" name="id">
                <input type="hidden" id="old" name="old" value="<?= $city['image']?>">
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="Update">
                </div>

            </form>
        </div>
    </div>
</div>
</div>