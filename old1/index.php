<?php
session_start();

require_once("DB.php");
require_once("Lib.php");
require_once("Pager.php");

$db = new DB();
$sql = "SELECT * FROM boards ORDER BY date DESC";

$page = 1;
if( isset($_GET['p']) && is_numeric($_GET['p']) ) 
{
	$page = $_GET['p'] * 1;
}

$sql = "SELECT b.*, u.username FROM boards AS b, users AS u WHERE b.writer = u.email ";
$sqlCnt = "SELECT COUNT(*) as cnt FROM boards AS b, users AS u WHERE b.writer = u.email ";
$params = [];

$queryParam = "";
if (isset($_GET['search']))
{
	$sql .= "AND (title LIKE ? OR comment LIKE ?) ";
	$sqlCnt .= "AND (title LIKE ? OR comment LIKE ?) ";
	$params[] = "%" . $_GET['search'] . "%";
	$params[] = "%" . $_GET['search'] . "%"; //2개 넣어준다.
	$queryParam .= "&search=" . urlencode($_GET['search']);
} else if(isset($_GET['category'])) {
	$sql .= "AND category = ? ";
	$sqlCnt .= "AND category = ? ";
	$params[] = $_GET['category'];
	$queryParam .= "&category=" . urlencode($_GET['category']);
} else if(isset($_GET['author'])) {
	$sql .= "AND writer = ? ";
	$sqlCnt .= "AND writer = ? ";
	$params[] = $_GET['author'];
	$queryParam .= "&author=" . urlencode($_GET['author']);
}
// 1페이지는 => 0 ~ 5
// 2페이지는 => 6 ~ 11
$cnt = ($page-1) * 6;
$sql .= "ORDER BY date DESC LIMIT {$cnt}, 6";

$list = $db->fetchAll($sql, $params);
$cnt = $db->fetch($sqlCnt, $params)->cnt;

$p = new Pager($cnt, $page);


?>
<!DOCTYPE html>
<html lang="ko">

<?php require_once("header.php"); ?>

<body>
	<div class="container">
		
		<div class="row">
			<?php require_once("searchSection.php"); ?>
			<!-- 블로그 글 목록 -->
			<div class="col-md-9">
				<div class="card-list">
					<!-- 블로그 글 -->
					<?php foreach ($list as $item) : ?>
						<div class="card my-card <?= $item->upimg == "" ? "no-image" : "" ?>">
							<?php if (isset($_SESSION['user'])) : ?>
								<?php if ($_SESSION['user']->email == $item->writer) : ?>
									<div class="menu-box">
										<a href="modify.php?id=<?= $item->id ?>" class="btn btn-success btn-sm me-1">수정</a>
										<a href="delete.php?id=<?= $item->id ?>" class="btn btn-danger btn-sm">삭제</a>
									</div>
								<?php endif; ?>
							<?php endif; ?>
							<?php if ($item->upimg != "") : ?>
								<div class="card-img">
									<img src="upload/<?= $item->upimg ?>" alt="image sample">
								</div>
							<?php endif; ?>
							<div class="card-body">
								<div class="title-box">
									<h5 class="card-title"><a href="view.php?id=<?= $item->id ?>"><?= htmlentities($item->title) ?></a></h5>
								</div>
								<div class="card-text"><?= htmlentities($item->comment) ?></div>
							</div>
							<div class="my-card-footer px-3">
								<div class="first-row">
									<span class="category"><strong>[<?= $item->category ?>]</strong></span>&nbsp;&nbsp;
									<span class="writer"><?= $item->writer ?></span>&nbsp;&nbsp;
								</div>
								<div class="second-row mt-1 px-2">
									<span class="date"><?= $item->date ?></span>&nbsp;&nbsp;
									<span class="commentcount">댓글수 <span class="badge bg-secondary">3</span></span>
								</div>
							</div>
							<!-- <div class="col-md-6 d-flex justify-content-end">
									
								</div>		 -->
						</div>
					<?php endforeach; ?>
					<!-- //블로그 글 -->
				</div>


				<!-- 페이지네이션(pagination) -->
				<nav class="my-4 d-flex justify-content-center">
					<ul class="pagination">
						<?php if($p->isPrev) : ?>
						<li class="page-item">
							<a class="page-link" href="/?p=<?= $p->startPage - 1 ?><?= $queryParam ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
					 	<?php endif; ?>
						
						<?php for($i = $p->startPage; $i <= $p->endPage; $i++): ?>
							<li class="page-item <?= $page == $i ? "active" : "" ?>">
								<a class="page-link" href="/?p=<?= $i ?><?= $queryParam ?>"><?= $i ?> </a>
							</li>
						<?php endfor; ?>
						
						<?php if($p->isNext) : ?>
						<li class="page-item">
							<a class="page-link" href="/?p=<?= $p->endPage + 1 ?><?= $queryParam ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							</a>
					  	</li>
						<?php endif; ?>
					</ul>
				</nav>

			</div>
			<!-- //블로그 글 목록 -->

			<!-- 오른쪽 칼럼(로그인, 카테고리, 글쓴이 목록) -->
			<div class="col-md-3">
				<?php require_once("userSection.php"); ?>
				
				<?php require_once("categorySection.php") ?>

				<?php require_once("authorSection.php") ?>
			</div>
			<!-- 오른쪽 칼럼(로그인, 카테고리, 글쓴이 목록) -->

		</div>
		<div class="footer">
			Copyright &copy; <strong>Our Blog</strong> All rights reserved.
		</div>
	</div>
</body>

</html>

//저게 미리 다 쳐져있으면 4과제를 푸는 데 시간이 단축
// A,B모듈을 미리끝내고 저걸 쳐두면 4과제 빨라지겠지
// 안산에서 지난 2년간 재미를 본게 
// 문제 뒤에 : 모든 환경설정은 건드리면 안된다. 
// htaccess와 document-root 변경한것도 전부 환경설정 0점처리 