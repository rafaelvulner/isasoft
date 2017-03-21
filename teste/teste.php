<?php

require_once '../dao/MesaDAO.php';

$dao = new MesaDAO();

echo $dao->qtdMesas();