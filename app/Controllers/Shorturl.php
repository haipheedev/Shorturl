<?php

namespace App\Controllers;
use App\Models\ShorturlModel;

class Shorturl extends BaseController
{
	public function index()
	{
		$model = new ShorturlModel();
		$data['shorturl'] = $model->getShorturl();
		echo view('layout/head');
		echo view('shorturl',$data);
		echo view('layout/footer');
	}

	public function create()
	{
	
			if($this->request->getMethod() === "post")
			{
				$model = new ShorturlModel();
				$ip = $_SERVER['REMOTE_ADDR'];
				$data = array(
					'shorturl' => $this->random_str(),
					'fullurl' => $this->request->getPost('fullurl'),
					'ip' => $ip
				);

				$id = $model->insert($data);

				if($id)
				{
					$dataget = $model->getId($id);
				
		
					//return redirect()->to("view/".$dataget['shorturl']);

					return $this->getdata($dataget['shorturl']);
					// echo view('layout/head');
					// echo view('success');
					// print_r();
					// echo view('layout/footer');
				}
			}
		
	
	
		
	}

	public function getdata($shorturl)
	{
		try
		{
			$model = new ShorturlModel();
			$data['shorturl'] = $model->getShorturl($shorturl);
			if($data['shorturl'])
			{
				echo view('layout/head');
				echo view('getdata',$data);
				echo view('layout/footer');
			}else{
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
			
		}
		catch (\Exception $e)
		{
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			
		}
		
	}

	public function goto($shorturl)
	{
		try
		{
			$model = new ShorturlModel();
			
			$datalist = $model->getShorturl($shorturl);
			if($datalist)
			{
				
				$data['url'] = $datalist['fullurl'];
				$model->gotourl($shorturl);
				
				echo view('gotourl',$data);
				
			}else{
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
			
		}
		catch (\Exception $e)
		{
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			
		}
		
	}

	public function delete()
	{
		try
		{
			if($this->request->getMethod() === "post")
			{
				$model = new ShorturlModel();
				$id = $this->request->getPost('ids');
				if($model->find($id))
				{
					$model->deleteid($id);
					echo view('layout/head');
					echo view('success');
					echo view('layout/footer');
				}else{
					echo view('layout/head');
					echo view('fails');
					echo view('layout/footer');
				}

			}
		}
		catch (\Exception $e)
		{
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			
		}

	}

	public function random_str($length = 5) {
		return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}
}
