<?php

include("KontrakView.php");
include("presenter/ProsesPasien.php");

class FormPasienView implements KontrakView
{
	private $prosespasien;
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
        $this->tpl = new Template("templates/form.html");

        if (isset($_GET['update'])) {
			
            $id = $_GET['update'];
            $data = $this->prosespasien->getDetail($_GET['update']);

			$this->tpl->replace("DATA_TITLE", "Update");
            $this->tpl->replace("UPDATE_LINK", "update=$id");
            $this->tpl->replace("NIK_VALUE", $data['nik']);
            $this->tpl->replace("NAMA_VALUE", $data['nama']);
            $this->tpl->replace("TEMPAT_VALUE", $data['tempat']);
            $this->tpl->replace("TL_VALUE", $data['tl']);
            $this->tpl->replace("GENDER_VALUE", $data['gender']);
            $this->tpl->replace("EMAIL_VALUE", $data['email']);
            $this->tpl->replace("TELP_VALUE", $data['telp']);
        }
		else {
			$this->tpl->replace("DATA_TITLE", "Add");
            $this->tpl->replace("UPDATE_LINK", "");
            $this->tpl->replace("NIK_VALUE", "");
            $this->tpl->replace("NAMA_VALUE", "");
            $this->tpl->replace("TEMPAT_VALUE", "");
            $this->tpl->replace("TL_VALUE", "");
            $this->tpl->replace("GENDER_VALUE", "");
            $this->tpl->replace("EMAIL_VALUE", "");
            $this->tpl->replace("TELP_VALUE", "");
        }

		$this->tpl->write();
	}
}