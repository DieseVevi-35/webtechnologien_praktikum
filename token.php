<?php
header('Content-Type: application/json');
echo json_encode(['token' => getenv('TOKEN')]);