<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MarketingImage;
use App\Traits\ManagesImages;
use App\Traits\ShowImages;

class PagesController extends Controller
{
	use ManagesImages, ShowImages;

	public function __construct()
	{
		$this->middleware('verified');
		$this->setImageDefaultsFromConfig('marketingImage');
	}

	public function index()
	{
		$featuredImage = MarketingImage::where('is_featured', 1)
		->where('is_active', 1)
		->first();
		$activeImages = MarketingImage::where('is_featured', 0)
		->where('is_active', 1)
		->orderBy('image_weight', 'asc')
		->get();
		$count = count($activeImages);
		$notEnoughImages =
		$this->notEnoughSliderImages($featuredImage, $activeImages);
		$imagePath = $this->imagePath;
		return view('pages.index', compact(
			'featuredImage',
			'activeImages',
			'count',
			'imagePath',
			'notEnoughImages'
		));
	}

	public function terms()
	{
		return view('pages.terms-of-service');
	}

	public function privacy()
	{
		return view('pages.privacy');
	}
}
