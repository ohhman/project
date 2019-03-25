<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Patient;

class SearchController extends Controller
{
	function index()
	{
		return view('search');
	}

	function action(Request $request)
	{
		if($request->ajax())
		{
			$output = '';
			$query = $request->get('query');
			if($query != '')
			{
				$shop = $request->get('option');
				
				if ($shop == "Shop"){
					$shops = DB::table('shops')
					->where('name', 'like', '%'.$query.'%')
					->orWhere('adress', 'like', '%'.$query.'%')
					->orWhere('phone_number', 'like', '%'.$query.'%')
					->orWhere('id', 'like', '%'.$query.'%')
					->get();
					$total_row = $shops->count();
				if($total_row > 0)
				{
					foreach($shops as $row)
					{
						$output .= '
						<tr>
						<td>'.$row->name.'</td>
						<td>'.$row->adress.'</td>
						<td>'.$row->phone_number.'</td>
						<td>'.$row->id.'</td>
						</tr>
						';
					}
					$shops = array(
					'table_data'  => $output,
					'total_data'  => $total_row
				);
				
				echo json_encode($shops);
				
				}
				}
				elseif($shop == "Category"){
				$categories = DB::table('categories')
					->where('name', 'like', '%'.$query.'%')
					->orWhere('description', 'like', '%'.$query.'%')
					->orWhere('img', 'like', '%'.$query.'%')
					->orWhere('id', 'like', '%'.$query.'%')
					->get();
					$total_row = $categories->count();
				if($total_row > 0)
				{
					foreach($categories as $row)
					{
						$output .= '
						<tr>
						<td>'.$row->name.'</td>
						<td>'.$row->description.'</td>
						<td>'.$row->img.'</td>
						<td>'.$row->id.'</td>
						</tr>
						';
					}
					$categories = array(
					'table_data'  => $output,
					'total_data'  => $total_row
				);
				
				echo json_encode($categories);
				
				}
				}
				elseif($shop == "Product"){
				$products = DB::table('products')
					->where('name', 'like', '%'.$query.'%')
					->orWhere('description', 'like', '%'.$query.'%')
					->orWhere('price', 'like', '%'.$query.'%')
					->orWhere('id', 'like', '%'.$query.'%')
					->get();
					$total_row = $products->count();
				if($total_row > 0)
				{
					foreach($products as $row)
					{
						$output .= '
						<tr>
						<td>'.$row->name.'</td>
						<td>'.$row->description.'</td>
						<td>'.$row->img.'</td>
						<td>'.$row->id.'</td>
						</tr>
						';
					}
					$products = array(
					'table_data'  => $output,
					'total_data'  => $total_row
				);
				
				echo json_encode($products);
				
				}
				}
		}		
				else
				{
					$output = '
					<tr>
					<td align="center" colspan="5">No shops Found</td>
					</tr>
					';
				}

				
			}
		}
	}