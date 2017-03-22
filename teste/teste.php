<?php

require_once '../dao/MesaDAO.php';

$dao = new MesaDAO();



echo $dao->transferirMesa(1, 50, 4);