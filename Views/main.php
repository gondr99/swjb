<!-- 블로그 글 목록 -->
<div class="col-md-9">
    <div class="card-list">
        <!-- 블로그 글 -->
        <?php foreach($list as $item) : ?>
            <div class="card my-card">
                <div class="menu-box">
                    <a href="modify.html" class="btn btn-success btn-sm me-1">수정</a>
                    <a href="" class="btn btn-danger btn-sm">삭제</a>
                </div>
                <div class="card-img">
                    <img src="images/sample1.jpg" alt="image sample">
                </div>
                <div class="card-body">
                    <div class="title-box">
                        <h5 class="card-title"><a href="/board/view?id=<?= $item->id ?>"><?= $item->title ?></a></h5>
                    </div>
                    <div class="card-text">
                       <?= $item->comment ?>
                    </div>
                </div>
                <div class="my-card-footer px-3">
                    <div class="first-row">
                        <span class="category"><strong>[life]</strong></span>&nbsp;&nbsp;
                        <span class="writer">홍길동</span>&nbsp;&nbsp;
                    </div>
                    <div class="second-row mt-1 px-2">
                        <span class="date">2019-03-05 15:30:22</span>&nbsp;&nbsp;
                        <span class="commentcount">댓글수 <span class="badge bg-secondary">3</span></span>
                    </div>
                </div>q
                <!-- <div class="col-md-6 d-flex justify-content-end">
                        
                    </div>		 -->
            </div>
        <?php endforeach; ?>
        <!-- //블로그 글 -->
    </div>


    <!-- 페이지네이션(pagination) -->
    <nav class="my-4 d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
        </nav>

</div>
<!-- //블로그 글 목록 -->