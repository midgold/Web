<?php

/* @var $this yii\web\View */

$this->title = 'Lytko';
?>


<div class="bricks_container">
  <div class="large_brick">
    <div v-if="visible" class="brick">
      <p class="large_p">Термостат {{info}}</p>
    </div>
    <div v-else class="brick thermostat">
      <div class="thermostat_header">
        <div>
          <svg height="16" width="20" viewBox="0 0 640 512">
            <path fill="#27afe9" d="M96 384H64a32 32 0 0 0-32 32v64a32 32 0 0 0 32 32h32a32 32 0 0 0 32-32v-64a32
            32 0 0 0-32-32zm160-128h-32a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h32a32 32 0 0 0
            32-32V288a32 32 0 0 0-32-32zm160-128h-32a32 32 0 0 0-32 32v320a32 32 0 0 0 32 32h32a32
            32 0 0 0 32-32V160a32 32 0 0 0-32-32zM576 0h-32a32 32 0 0 0-32 32v448a32 32 0 0 0 32
            32h32a32 32 0 0 0 32-32V32a32 32 0 0 0-32-32z"></path>
          </svg>
        </div>

        <p>LYTKO-esp mk1</p>

        <div>
          <svg height="20" width="20" viewBox="0 0 448 512">
            <path fill="#27afe9" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6
            0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12
            12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12
            5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6
            0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6
            0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6
            0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5
            0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6
            5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3
            0 6-2.7 6-6z"></path>
          </svg>
        </div>
      </div>

      <div class="thermostat_info">

        <div class="target_degree_container">
          <p class="target_degree">27</p>
          <transition name="fade">
            <svg class="arrow_temp" height="17" width="26" viewBox="0 250 320 200">
                <path fill="white" d="M177 256l136 135.63a23.78 23.78 0 0 1 0 33.8L290.36
                448a23.94 23.94 0 0 1-33.89 0l-96.37-96.16L63.73 448a23.94 23.94 0 0 1-33.89 0L7.05 425.53a23.78 23.78 0 0 1
                0-33.8L143 256.12a23.94 23.94 0 0 1 34-.1z" class="second"></path>
            </svg>
          </transition>

          <p class="H_btn">H</p>
        </div>

        <div class="current_degree_container">
          <p class="current_degree">25</p>
          <div class="degree">
            <svg height="16" width="16" viewBox="0 0 512 512">
                <path fill="white" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8
                256 8zm216 248c0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216
                118.7 0 216 96.1 216 216z"></path>
            </svg>
            <span>C</span>
          </div>
        </div>

        <div class="btn_temp_container">
          <div class="btn_temp">
            <svg height="50" width="50" viewBox="0 0 448 512">
              <path fill="white" d="M322.9 304H125.1c-10.7 0-16.1-13-8.5-20.5l98.9-98.3c4.7-4.7 12.2-4.7
              16.9 0l98.9 98.3c7.7 7.5 2.3 20.5-8.4 20.5zM448 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5
              21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-48 346V86c0-3.3-2.7-6-6-6H54c-3.3 0-6 2.7-6 6v340c0 3.3 2.7 6 6
              6h340c3.3 0 6-2.7 6-6z"></path>
            </svg>
          </div>
          <div class="btn_temp">
            <svg height="50" width="50" viewBox="0 0 448 512">
                <path fill="white" d="M125.1 208h197.8c10.7 0 16.1 13 8.5 20.5l-98.9 98.3c-4.7 4.7-12.2
                4.7-16.9 0l-98.9-98.3c-7.7-7.5-2.3-20.5 8.4-20.5zM448 80v352c0 26.5-21.5 48-48 48H48c-26.5
                0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-48 346V86c0-3.3-2.7-6-6-6H54c-3.3
                0-6 2.7-6 6v340c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div v-for="brick in bricks_text" class="small_brick">
    <div v-if="visible" class="brick">
      <p class="small_p">{{brick.type}}</p>
    </div>
    <div v-else class="brick">
      <p class="info">{{brick.text}}</p>
    </div>
  </div>

  <div v-for="(brick, index) in bricks_indicator" class="small_brick">
    <div v-if="visible" class="brick">
      <p class="small_p">{{brick.type}}</p>
    </div>

    <div v-else class="brick small_wtih_cb">
      <p>{{brick.header}}</p>
      <div v-if="brick.brick_cb" class="tg-list-item">
       <input class="tgl tgl-ios" v-bind:id="index" type="checkbox"/>
       <label class="tgl-btn" v-bind:for="index"></label>
     </div>
      <div v-else class="indicator"></div>
    </div>
  </div>

  <div v-for="brick in bricks_managment" class="medium_brick">
    <div class="brick">

    </div>
  </div>

  <div class="small_brick">
    <div class="brick">
      <svg width="87" height="74" viewBox="0 0 87 74" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g filter="url(#filter0_d)">
        <path d="M33.7997 62C31.4669 62 31.8635 61.1192 31.0589 58.898L24.1997 36.3242L76.9997 5" fill="#CBD4DC"/>
        <path d="M33.7998 62.0001C35.5998 62.0001 36.3948 61.1769 37.3998 60.2001L46.9998 50.8653L35.025 43.6443" fill="#B1B3B5"/>
        <path d="M35.0239 43.6461L64.0399 65.0835C67.3513 66.9105 69.7405 65.9643 70.5655 62.0097L82.3765 6.35192C83.5855 1.50392 80.5285 -0.695683 77.3605 0.742517L8.00648 27.4851C3.27248 29.3841 3.30068 32.0253 7.14368 33.2019L24.9415 38.7573L66.1453 12.7623C68.0905 11.5827 69.8761 12.2163 68.4109 13.5171" fill="url(#paint0_linear)"/>
        </g>
        <defs>
        <filter id="filter0_d" x="0.351074" y="0.308105" width="86.2956" height="73.6699" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
        <feOffset dy="4"/>
        <feGaussianBlur stdDeviation="2"/>
        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
        </filter>
        <linearGradient id="paint0_linear" x1="56.0262" y1="29.0059" x2="67.2627" y2="54.6072" gradientUnits="userSpaceOnUse">
        <stop stop-color="#ECECEC"/>
        <stop offset="1" stop-color="white"/>
        </linearGradient>
        </defs>
      </svg>
    </div>
  </div>

</div>
