<div class="col-8 offset-2 my-4">
    <?php foreach ($list as $item): ?>
        <div class="card mb-1">
            <div class="card-body">
                <span class="name"><?= $item ?></span>
                <div class="menu">
                    <a href="/download?user=<?= user()->userid ?>&name=<?= urlencode($item) ?>" class="btn btn-primary btn-sm">다운로드</a>
                    <a href="/down" class="btn btn-danger btn-sm">삭제</a>
                    <a href="/down" class="btn btn-success btn-sm">공유</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!--수이괜-->