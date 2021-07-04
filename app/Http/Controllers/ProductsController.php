<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Show the form for saving products in database.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return response(view('import'), 200);
    }

    /**
     * Store all products into the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $upload = $request->file('upload-file');
        if ($upload === null) {
            return response(view('errors.406-no-file'), 406);
        }

        $filePath = $upload->getRealPath();
        $file = fopen($filePath, 'r');
        $header = fgetcsv($file);

        if (mime_content_type($filePath) !== "text/plain") {
            return response(view('errors.406-incorrect-file-type'), 406);
        } else if (count($header) !== 22 && $header[2] !== "SKU") {
            return response(view('errors.406-wrong-format'), 406);
        }

        $escapedHeader = [];
        foreach($header as $key => $value) {
            $lowerCaseHeader = strtolower($value);
            $escapedItem = preg_replace('/[^a-z0-9]/', '', $lowerCaseHeader);
            array_push($escapedHeader, $escapedItem);
        }

        while($columns = fgetcsv($file)) {
            if($columns[0] === "") {
                continue;
            }
            $arrayOfValues = [];
            foreach($columns as $key => &$value)
            {
                $value = preg_replace('/[^a-zA-Z0-9.]\r/', '', $value);
                array_push($arrayOfValues, $value);

            }
            $data = array_combine($escapedHeader, $arrayOfValues);
            $this->makeEmptyFieldsNull($data);
        }
    }

    private function makeEmptyFieldsNull($data)
    {
        foreach ($data as $key => $value){
            if ($value === ""){
                $data[$key] = null;
            }
        }

        $name = $data['name'];
        $sku = $data['sku'];
        $stock = $data['stock'];
        $cog = $data['cog'];
        $price = $data['price'];
        $length = $data['length'];
        $width = $data['width'];
        $height = $data['height'];
        $weight = $data['weight'];
        $fdwsku = $data['fdwsku'];
        $colour_0 = $data['colour0'];
        $colour_1 = $data['colour1'];
        $colour_2 = $data['colour2'];
        $asin_UK = $data['asinuk'];
        $asin_US = $data['asinus'];
        $asin_CA = $data['asinca'];
        $asin_FR = $data['asinfr'];
        $asin_DE = $data['asinde'];
        $asin_ES = $data['asines'];
        $asin_IT = $data['asinit'];
        $asin_NL = $data['asinnl'];
        $asin_SE = $data['asinse'];

        $product = Product::firstOrNew(['name' => $name]);

        $product->SKU = $sku;
        $product->stock = $stock;
        $product->COG = $cog;
        $product->price = $price;
        $product->length = $length;
        $product->width = $width;
        $product->height = $height;
        $product->weight = $weight;
        $product->FDW_SKU = $fdwsku;
        $product->colour_0 = $colour_0;
        $product->colour_1 = $colour_1;
        $product->colour_2 = $colour_2;
        $product->ASIN_UK = $asin_UK;
        $product->ASIN_US = $asin_US;
        $product->ASIN_CA = $asin_CA;
        $product->ASIN_FR = $asin_FR;
        $product->ASIN_DE = $asin_DE;
        $product->ASIN_ES = $asin_ES;
        $product->ASIN_IT = $asin_IT;
        $product->ASIN_NL =  $asin_NL;
        $product->ASIN_SE = $asin_SE;

        echo "<pre>";
        var_dump($data);
        echo "</pre>";

        $product->save();
    }
}
