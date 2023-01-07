<div class="col-8 offset-2 my-4">
    <?php foreach ($list as $item): ?>
        <div class="card mb-1">
            <div class="card-body">
                <span class="name"><?= $item ?></span>
                <div class="menu">
                    <a href="/down" class="btn btn-primary btn-sm">다운로드</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>