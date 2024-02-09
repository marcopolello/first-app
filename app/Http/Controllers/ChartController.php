<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function chartView()
    {
        // Replace this with your actual data retrieval logic
        //$data = [
        //    'labels' => ['January', 'February', 'March', 'April', 'May'],
        //    'data' => [65, 59, 80, 81, 56],
        //];
        // Replace this with your actual API endpoint
        $apiUrl = 'https://datausa.io/api/data?drilldowns=Nation&measures=Population';

        // Make a request to the API and decode the JSON response
        $apiData = json_decode(file_get_contents($apiUrl), true);

        $data = [];

        foreach ($apiData['data'] as $row) {
            $data['labels'][] = $row['Year'];
            $data['data'][] = $row['Population'];
        }

        //$data = [
        //    'labels' => ['January', 'February', 'March', 'April', 'May'],
        //    'data' => [65, 59, 80, 81, 56]
        //];

        // Pass the API data to the view
        return view('chartView', compact('data'));
    }
}
