<?php
$step = isset($step)?(int)$step:1;
?>
<ul class="setup-panel">
    <li class="step @if($step==1) active @endif">
        <a @if($step>1 && $step!=4)  href="{{ route('payment.step.get', 1) }}" @else href="javascript:void(0)" @endif>
            <span class="basket-logo">
              <svg id="Icon_20_Grey_Shopping_Cart" data-name="Icon / 20 / Grey / Shopping Cart"
                   xmlns="http://www.w3.org/2000/svg" width="19.963" height="17.986" viewBox="0 0 19.963 17.986">
                <path id="Shape" d="M2.252,4.742H4L1.408.369A.759.759,0,0,0,.375.1.731.731,0,0,0,.1,1.118Z"
                      transform="translate(11.776)" fill="#9dafbd" />
                <path id="Shape-2" data-name="Shape"
                      d="M3.9,1.116A.735.735,0,0,0,3.627.1.762.762,0,0,0,2.594.367L0,4.744H1.75Z"
                      transform="translate(4.193 0.002)" fill="#9dafbd" />
                <path id="Shape-3" data-name="Shape"
                      d="M15.156,11.9H4.549A1.74,1.74,0,0,1,2.922,10.51L1.685,3.918h-.4A1.273,1.273,0,0,1,0,2.658V1.26A1.273,1.273,0,0,1,1.283,0H18.676a1.278,1.278,0,0,1,1.287,1.256v1.4a1.273,1.273,0,0,1-1.282,1.26h-.652l-1.246,6.6A1.741,1.741,0,0,1,15.156,11.9Zm-1.8-7.172a.72.72,0,0,0-.725.713V9.431a.726.726,0,0,0,1.451,0V5.444A.72.72,0,0,0,13.352,4.731Zm-2.327,0a.738.738,0,0,0-.725.713V9.431a.726.726,0,0,0,1.451,0V5.444A.72.72,0,0,0,11.025,4.731Zm-2.341,0a.72.72,0,0,0-.725.713V9.431a.726.726,0,0,0,1.451,0V5.444A.738.738,0,0,0,8.684,4.731Zm-2.327,0a.72.72,0,0,0-.725.713V9.431a.726.726,0,0,0,1.451,0V5.444A.72.72,0,0,0,6.357,4.731Z"
                      transform="translate(0 6.083)" fill="#9dafbd" />
              </svg>
            </span>
            <div class="">
                <h4 class="list-group-item-heading">
                    Sepetim</h4>
                <p class="list-group-item-text">Adım 1</p>
            </div>
        </a>
    </li>
    <li class="step @if($step==2) active @endif">
        <a @if($step>2 && $step!=4)  href="{{ route('payment.step.get', 2) }}" @else href="javascript:void(0)" @endif>
            <span class="basket-logo">
              <svg id="Icon_20_Grey_Shopping_Cart" data-name="Icon / 20 / Grey / Shopping Cart"
                   xmlns="http://www.w3.org/2000/svg" width="20" height="13" viewBox="0 0 20 13">
                <path id="Shape"
                      d="M15.951,13a2.226,2.226,0,0,1-2.172-1.6h-7.4A2.268,2.268,0,0,1,4.209,13a2.228,2.228,0,0,1-2.173-1.6H.836A.83.83,0,0,1,0,10.578V.826A.8.8,0,0,1,.77,0H9.68a.8.8,0,0,1,.77.826v.9h3.3a1.5,1.5,0,0,1,1.2.6.2.2,0,0,1,.035.044.2.2,0,0,0,.035.044l1.741,2.579,1.017.157A1.461,1.461,0,0,1,19.254,6.6V8.708A.843.843,0,0,1,20,9.535v1.043a.83.83,0,0,1-.836.823h-1.04A2.271,2.271,0,0,1,15.951,13Zm0-3.336a1.137,1.137,0,0,0-1.131,1.112,1.123,1.123,0,0,0,1.131,1.112,1.137,1.137,0,0,0,1.131-1.112A1.123,1.123,0,0,0,15.951,9.663Zm-11.741,0a1.137,1.137,0,0,0-1.131,1.112A1.131,1.131,0,1,0,4.209,9.663ZM12,2.825a.1.1,0,0,0-.106.1V4.973A.106.106,0,0,0,12,5.078v0h3.193a.1.1,0,0,0,.09-.054.1.1,0,0,0,0-.107l-1.4-2.043a.1.1,0,0,0-.086-.044Z"
                      transform="translate(0 0)" fill="#9dafbd" />
              </svg>
            </span>
            <div class="">
                <h4 class="list-group-item-heading">
                    Teslimat & Fatura</h4>
                <p class="list-group-item-text">Adım 2</p>
            </div>
        </a>
    </li>
    <li class="step @if($step==3) active @endif">
        <a @if($step>3 && $step!=4)  href="{{ route('payment.step.get', 3) }}" @else href="javascript:void(0)" @endif>
            <span class="basket-logo">
              <svg id="Icon_20_Grey_Shopping_Cart" data-name="Icon / 20 / Grey / Shopping Cart"
                   xmlns="http://www.w3.org/2000/svg" width="17.971" height="18.986" viewBox="0 0 17.971 18.986">
                <path id="Shape"
                      d="M14.325,4.893a.255.255,0,0,0,.1-.486L4.938.1A1.136,1.136,0,0,0,3.423.7L.1,8.32a1.184,1.184,0,0,0,.581,1.55l1.914.847a.365.365,0,0,0,.513-.338V7.143A2.222,2.222,0,0,1,5.3,4.9h9.023v0Z"
                      transform="translate(0 0)" fill="#9dafbd" />
                <path id="Shape-2" data-name="Shape"
                      d="M2.707,10.7H1.162A1.177,1.177,0,0,1,0,9.508V1.189A1.177,1.177,0,0,1,1.162,0h11.51a1.177,1.177,0,0,1,1.162,1.189V9.5a1.177,1.177,0,0,1-1.162,1.189H11.127a4.453,4.453,0,0,0,.057-.711,4.537,4.537,0,0,0-.072-.8h1.249V5.207H1.477V9.189H2.723a4.629,4.629,0,0,0-.072.8,4.456,4.456,0,0,0,.057.71ZM1.477,1.507V2.755H12.361V1.507Z"
                      transform="translate(4.137 5.95)" fill="#9dafbd" />
                <path id="Shape-3" data-name="Shape"
                      d="M2.984,6.108A3.024,3.024,0,0,1,0,3.054,3.023,3.023,0,0,1,2.984,0,3.023,3.023,0,0,1,5.97,3.054,3.024,3.024,0,0,1,2.984,6.108Zm-.873-2.25c-.036,0-.057.028-.08.105s-.053.185-.083.3c-.038.135-.024.167.1.229a1.752,1.752,0,0,0,.506.148c.137.023.144.032.144.175v.2c0,.087.042.132.121.132l.143,0,.142,0a.108.108,0,0,0,.118-.124c0-.031,0-.062,0-.092,0-.063,0-.121,0-.18a.142.142,0,0,1,.122-.164.932.932,0,0,0,.5-.326.908.908,0,0,0,.186-.741.948.948,0,0,0-.466-.647,4.374,4.374,0,0,0-.5-.233,1.173,1.173,0,0,1-.274-.159.254.254,0,0,1-.1-.231.264.264,0,0,1,.163-.2.49.49,0,0,1,.166-.035l.075,0a1.214,1.214,0,0,1,.556.13.2.2,0,0,0,.082.025c.038,0,.061-.027.084-.1.034-.1.062-.2.089-.3l.01-.038a.118.118,0,0,0-.076-.159,1.649,1.649,0,0,0-.4-.121c-.183-.027-.183-.027-.183-.213,0-.265,0-.265-.258-.265h-.11c-.121,0-.14.023-.145.148v.167c0,.158,0,.159-.143.212l-.013,0a.876.876,0,0,0-.626.813.827.827,0,0,0,.46.8,2.546,2.546,0,0,0,.4.192c.058.023.114.047.17.071A.792.792,0,0,1,3.2,3.5a.308.308,0,0,1,.118.281.3.3,0,0,1-.186.232.627.627,0,0,1-.267.057.792.792,0,0,1-.1-.007A1.593,1.593,0,0,1,2.2,3.89.218.218,0,0,0,2.111,3.858Z"
                      transform="translate(8.071 12.878)" fill="#9dafbd" />
              </svg>
            </span>
            <div class="">
                <h4 class="list-group-item-heading">
                    Ödeme Bilgileri</h4>
                <p class="list-group-item-text">Adım 3</p>
            </div>
        </a>
    </li>
    <li class="step @if($step==4) active @endif">
        <a @if($step>4)  href="{{ route('payment.step.get', 4) }}" @else href="javascript:void(0)" @endif>
            <span class="basket-logo">
              <svg id="Icon_20_Grey_Shopping_Cart" data-name="Icon / 20 / Grey / Shopping Cart"
                   xmlns="http://www.w3.org/2000/svg" width="19.942" height="19.983" viewBox="0 0 19.942 19.983">
                <path id="Shape"
                      d="M4.367,4.363l.049-.008.008-.049A2.311,2.311,0,0,1,5.4,2.8l-2.7-2.7a.315.315,0,0,0-.537.221L2.138,2.227.322,2.195a.315.315,0,0,0-.23.537l2.68,2.68s0-.012.008-.016A2.317,2.317,0,0,1,4.367,4.363Z"
                      transform="translate(0 0)" fill="#9dafbd" />
                <path id="Shape-2" data-name="Shape"
                      d="M5.3,2.68,2.623,0s0,.012-.008.016A2.309,2.309,0,0,1,1.029,1.053L.98,1.061l-.008.049A2.311,2.311,0,0,1,0,2.619l2.7,2.7A.315.315,0,0,0,3.242,5.1l.016-1.914,1.816.033A.319.319,0,0,0,5.3,2.68Z"
                      transform="translate(14.548 14.567)" fill="#9dafbd" />
                <path id="Shape-3" data-name="Shape"
                      d="M7.772,14.259a.927.927,0,0,1-.629-.246l-.271-.25a.936.936,0,0,0-1.082-.131l-.319.176a.931.931,0,0,1-1.316-.471L4.019,13a.929.929,0,0,0-.871-.588H3.1l-.365.021H2.687a.938.938,0,0,1-.685-.3.915.915,0,0,1-.245-.7l.024-.365a.942.942,0,0,0-.573-.926L.868,10A.933.933,0,0,1,.417,8.681l.18-.32A.935.935,0,0,0,.482,7.279L.237,7A.933.933,0,0,1,.4,5.615l.3-.209a.932.932,0,0,0,.369-1.024l-.1-.353a.935.935,0,0,1,.754-1.176L2.089,2.8a.933.933,0,0,0,.774-.762l.062-.36A.927.927,0,0,1,4.113.94l.353.106a.933.933,0,0,0,.269.039.935.935,0,0,0,.76-.392l.213-.3A.927.927,0,0,1,7.1.247L7.367.5A.935.935,0,0,0,8,.742.939.939,0,0,0,8.449.627L8.769.452a.931.931,0,0,1,1.316.471l.135.34a.927.927,0,0,0,.869.587h.049l.365-.02h.049a.938.938,0,0,1,.685.3.915.915,0,0,1,.245.7l-.024.365a.942.942,0,0,0,.573.926l.34.139a.934.934,0,0,1,.451,1.324l-.18.32a.935.935,0,0,0,.114,1.082L14,7.255a.934.934,0,0,1-.168,1.39l-.3.209a.932.932,0,0,0-.369,1.024l.1.353a.935.935,0,0,1-.754,1.176l-.361.058a.933.933,0,0,0-.774.761l-.062.361a.928.928,0,0,1-1.188.734l-.353-.106a.93.93,0,0,0-1.029.353l-.213.3A.93.93,0,0,1,7.772,14.259ZM7.119,2.711a4.419,4.419,0,1,0,3.125,1.294A4.391,4.391,0,0,0,7.119,2.711Z"
                      transform="translate(2.848 2.858)" fill="#9dafbd" />
                <path id="Shape-4" data-name="Shape"
                      d="M4.332,1.96,3.631.243a.389.389,0,0,0-.721,0l-.7,1.717L.36,2.1a.388.388,0,0,0-.221.684l1.418,1.2-.443,1.8A.388.388,0,0,0,1.7,6.2l1.574-.98,1.574.98a.388.388,0,0,0,.582-.422l-.443-1.8L6.4,2.78A.388.388,0,0,0,6.18,2.1Z"
                      transform="translate(6.7 6.685)" fill="#9dafbd" />
              </svg>
            </span>
            <div class="">
                <h4 class="list-group-item-heading">
                    Alışveriş Onayı</h4>
                <p class="list-group-item-text">Adım 4</p>
            </div>
        </a>
    </li>
</ul>
