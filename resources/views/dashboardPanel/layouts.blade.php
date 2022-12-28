<!--
  =========================================================
  * Soft UI backend Tailwind - v1.0.4
  =========================================================

  * Product Page: https://www.creative-tim.com/product/soft-ui-dashboard-tailwind
  * Copyright 2022 Creative Tim (https://www.creative-tim.com)
  * Licensed under MIT (https://www.creative-tim.com/license)
  * Coded by Creative Tim

  =========================================================

  * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="apple-touch-icon" sizes="76x76" href="backend/assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="backend/assets/img/favicon.png" />
  <title>Soft UI backend Tailwind</title>
  <!-- styles  -->
  @include('dashboardPanel.includes.styles')
</head>

<body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
  <!-- sidenav  -->
  @include('dashboardPanel.includes.sidebar')
  <main class="ease-soft-in-out xl:mr-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
    <!-- Navbar -->
    @include('dashboardPanel.includes.header')
    <!-- content && footer  -->
    <div class="w-full px-6 py-6 mx-auto">
      @yield('content')
      @include('dashboardPanel.includes.footer')
    </div>
  </main>
  <!-- scripts  -->
  @include('dashboardPanel.includes.scripts')
</body>
</html>
