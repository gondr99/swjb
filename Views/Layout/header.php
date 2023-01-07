<div class="row header mb-4 d-flex justify-content-between">
    <div class="col-4">
        <h3>파일 관리자</h3>
    </div>

    <?php if(!user()) : ?>
        <div class="col-4 d-flex justify-content-end">
            <a href="/register" class="me-2 btn btn-success">회원가입</a>
            <a href="/login" class="btn btn-primary">로그인</a>
        </div>
    <?php else: ?>
        <div class="col-4 d-flex justify-content-end">
            <a href="/upload" class="me-2 btn btn-outline-success">업로드</a>
            <a href="/list" class="btn btn-outline-primary">리스트</a>
            <a href="/logout" class="btn btn-outline-danger">로그아웃</a>
        </div>
    <?php endif; ?>
</div>