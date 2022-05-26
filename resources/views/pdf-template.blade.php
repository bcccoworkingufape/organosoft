<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
      :root {
        box-sizing: border-box;
      }

      @page { 
        margin: 0in;
      }
      
      body {
        position: relative;
        font-family: Nunito, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 12px;
        /* border-right: 20px solid #3c924e;
        border-left: 20px solid #3c924e; */
        background-color: #3c924e;
      }

      body::before {
        position: absolute;
        right: 0;
        bottom: 0;
        content: '';
        width: 35px;
        height: 150px;
        background-color: #006324;
        z-index: 3;
      }

      body::after {
        position: absolute;
        right: 0;
        bottom: 145px;
        content: '';
        width: 35px;
        height: 60px;
        transform: rotate(45deg), translateX(23px);
        background-color: #006324;
        z-index: 3;
      }
      
      h1, h2, h3, h4, h5, h6, p {
        margin: 0;
        padding: 0;
      }

      .organosoft-pdf__content {
        position: absolute;
        background-color: #fff;
        height: 100%;
        width: 88%;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        padding: 0.3in;
        z-index: 2;
      }

      .organosoft-pdf__title {
        color: #006324;
        font-weight: bold;
      }

      .organosoft-pdf__subtitle {
        color: #3c924e;
        font-weight: bold;
      }

      .organosoft-pdf__table {
        table-layout: fixed;
        width: 100%;
      }

      .organosoft-pdf__table thead {
        color: #006324;
        font-weight: bold;
        border-bottom: 1px solid #006324;
        text-align: center;
      }
      
      .organosoft-pdf__table tbody {
        color: #3c924e;
        font-weight: bold;
        text-align: center;
      }
    </style>
</head>
<body>
    <div class="organosoft-pdf__content">
      <h1 class="organosoft-pdf__title">{{ $title }}</h1>
      <h4 class="organosoft-pdf__subtitle">{{ $date }}</h4>
  
      <table class="organosoft-pdf__table">
        <thead>
          <tr>
            @foreach($columns as $column)
              <th border="1px" style="width: {{ 100 / count($columns) }};">
                {{ $column }}
              </th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach($data as $row) 
            <tr>
              @foreach($row as $value )
                <td>{{ $value }}</td>
              @endforeach
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</body>
</html>