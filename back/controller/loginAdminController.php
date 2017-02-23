<?php 
if($_SESSION['state'] !== 'connected') {
	header('Location: http://localhost:8888/cogan/blog/front/');
}