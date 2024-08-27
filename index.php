<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8">
        <title>Task Management System - Efficient Project and Task Management</title>
        <meta name="description" content="Task Management System offers intuitive tools to streamline project and task management, enhance team collaboration, and provide real-time insights."/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="Task Management System - Efficient Project and Task Management">
        <meta property="og:description" content="Task Management System offers intuitive tools to streamline project and task management, enhance team collaboration, and provide real-time insights.">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Task Management System - Efficient Project and Task Management">
        <meta name="twitter:description" content="Task Management System offers intuitive tools to streamline project and task management, enhance team collaboration, and provide real-time insights.">
        <meta property="og:image" content="https://images.unsplash.com/photo-1665686310934-8fab52b3821b?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3w0MzEzMzd8MHwxfHNlYXJjaHwxfHxidXNpbmVzc3xlbnwwfDB8fHwxNzIwMDc4NDE2fDA&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1920">
        <meta name="twitter:image" content="https://images.unsplash.com/photo-1665686310934-8fab52b3821b?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3w0MzEzMzd8MHwxfHNlYXJjaHwxfHxidXNpbmVzc3xlbnwwfDB8fHwxNzIwMDc4NDE2fDA&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1920">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=IBM+Plex+Sans:wght@300;400;500;600;700&family=Heebo:wght@300;400;500;600;700&family=Arimo:wght@300;400;500;600;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'"/>
        <noscript>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=IBM+Plex+Sans:wght@300;400;500;600;700&family=Heebo:wght@300;400;500;600;700&family=Arimo:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
        </noscript>
        <style>
            *,::after,::before {
                box-sizing: border-box;
                border-width: 0;
                border-style: solid;
                border-color: #e5e7eb
            }

            ::after,::before {
                --tw-content: ''
            }

            html {
                line-height: 1.5;
                -webkit-text-size-adjust: 100%;
                -moz-tab-size: 4;
                -o-tab-size: 4;
                tab-size: 4;
                font-family: ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
                font-feature-settings: normal;
                font-variation-settings: normal
            }

            body {
                margin: 0;
                line-height: inherit
            }

            hr {
                height: 0;
                color: inherit;
                border-top-width: 1px
            }

            abbr:where([title]) {
                -webkit-text-decoration: underline dotted;
                text-decoration: underline dotted
            }

            h1,h2,h3,h4,h5,h6 {
                font-size: inherit;
                font-weight: inherit
            }

            a {
                color: inherit;
                text-decoration: inherit
            }

            b,strong {
                font-weight: bolder
            }

            code,kbd,pre,samp {
                font-family: ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
                font-size: 1em
            }

            small {
                font-size: 80%
            }

            sub,sup {
                font-size: 75%;
                line-height: 0;
                position: relative;
                vertical-align: baseline
            }

            sub {
                bottom: -.25em
            }

            sup {
                top: -.5em
            }

            table {
                text-indent: 0;
                border-color: inherit;
                border-collapse: collapse
            }

            button,input,optgroup,select,textarea {
                font-family: inherit;
                font-size: 100%;
                font-weight: inherit;
                line-height: inherit;
                color: inherit;
                margin: 0;
                padding: 0
            }

            button,select {
                text-transform: none
            }

            [type=button],[type=reset],[type=submit],button {
                -webkit-appearance: button;
                background-color: transparent;
                background-image: none
            }

            :-moz-focusring {
                outline: auto
            }

            :-moz-ui-invalid {
                box-shadow: none
            }

            progress {
                vertical-align: baseline
            }

            ::-webkit-inner-spin-button,::-webkit-outer-spin-button {
                height: auto
            }

            [type=search] {
                -webkit-appearance: textfield;
                outline-offset: -2px
            }

            ::-webkit-search-decoration {
                -webkit-appearance: none
            }

            ::-webkit-file-upload-button {
                -webkit-appearance: button;
                font: inherit
            }

            summary {
                display: list-item
            }

            blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre {
                margin: 0
            }

            fieldset {
                margin: 0;
                padding: 0
            }

            legend {
                padding: 0
            }

            menu,ol,ul {
                list-style: none;
                margin: 0;
                padding: 0
            }

            textarea {
                resize: vertical
            }

            input::-moz-placeholder,textarea::-moz-placeholder {
                opacity: 1;
                color: #9ca3af
            }

            input::placeholder,textarea::placeholder {
                opacity: 1;
                color: #9ca3af
            }

            [role=button],button {
                cursor: pointer
            }

            :disabled {
                cursor: default
            }

            audio,canvas,embed,iframe,img,object,svg,video {
                display: block;
                vertical-align: middle
            }

            img,video {
                max-width: 100%;
                height: auto
            }

            [hidden] {
                display: none
            }

            *,::after,::before {
                --tw-border-spacing-x: 0;
                --tw-border-spacing-y: 0;
                --tw-translate-x: 0;
                --tw-translate-y: 0;
                --tw-rotate: 0;
                --tw-skew-x: 0;
                --tw-skew-y: 0;
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                --tw-pan-x: ;
                --tw-pan-y: ;
                --tw-pinch-zoom: ;
                --tw-scroll-snap-strictness: proximity;
                --tw-ordinal: ;
                --tw-slashed-zero: ;
                --tw-numeric-figure: ;
                --tw-numeric-spacing: ;
                --tw-numeric-fraction: ;
                --tw-ring-inset: ;
                --tw-ring-offset-width: 0px;
                --tw-ring-offset-color: #fff;
                --tw-ring-color: rgb(59 130 246 / 0.5);
                --tw-ring-offset-shadow: 0 0 #0000;
                --tw-ring-shadow: 0 0 #0000;
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                --tw-blur: ;
                --tw-brightness: ;
                --tw-contrast: ;
                --tw-grayscale: ;
                --tw-hue-rotate: ;
                --tw-invert: ;
                --tw-saturate: ;
                --tw-sepia: ;
                --tw-drop-shadow: ;
                --tw-backdrop-blur: ;
                --tw-backdrop-brightness: ;
                --tw-backdrop-contrast: ;
                --tw-backdrop-grayscale: ;
                --tw-backdrop-hue-rotate: ;
                --tw-backdrop-invert: ;
                --tw-backdrop-opacity: ;
                --tw-backdrop-saturate: ;
                --tw-backdrop-sepia:
            }

            ::backdrop {
                --tw-border-spacing-x: 0;
                --tw-border-spacing-y: 0;
                --tw-translate-x: 0;
                --tw-translate-y: 0;
                --tw-rotate: 0;
                --tw-skew-x: 0;
                --tw-skew-y: 0;
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                --tw-pan-x: ;
                --tw-pan-y: ;
                --tw-pinch-zoom: ;
                --tw-scroll-snap-strictness: proximity;
                --tw-ordinal: ;
                --tw-slashed-zero: ;
                --tw-numeric-figure: ;
                --tw-numeric-spacing: ;
                --tw-numeric-fraction: ;
                --tw-ring-inset: ;
                --tw-ring-offset-width: 0px;
                --tw-ring-offset-color: #fff;
                --tw-ring-color: rgb(59 130 246 / 0.5);
                --tw-ring-offset-shadow: 0 0 #0000;
                --tw-ring-shadow: 0 0 #0000;
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                --tw-blur: ;
                --tw-brightness: ;
                --tw-contrast: ;
                --tw-grayscale: ;
                --tw-hue-rotate: ;
                --tw-invert: ;
                --tw-saturate: ;
                --tw-sepia: ;
                --tw-drop-shadow: ;
                --tw-backdrop-blur: ;
                --tw-backdrop-brightness: ;
                --tw-backdrop-contrast: ;
                --tw-backdrop-grayscale: ;
                --tw-backdrop-hue-rotate: ;
                --tw-backdrop-invert: ;
                --tw-backdrop-opacity: ;
                --tw-backdrop-saturate: ;
                --tw-backdrop-sepia:
            }

            .container {
                width: 100%
            }

            @media (min-width: 640px) {
                .container {
                    max-width:640px
                }
            }

            @media (min-width: 768px) {
                .container {
                    max-width:768px
                }
            }

            @media (min-width: 1024px) {
                .container {
                    max-width:1024px
                }
            }

            @media (min-width: 1280px) {
                .container {
                    max-width:1280px
                }
            }

            @media (min-width: 1536px) {
                .container {
                    max-width:1536px
                }
            }

            .absolute {
                position: absolute
            }

            .relative {
                position: relative
            }

            .-left-56 {
                left: -14rem
            }

            .-left-80 {
                left: -20rem
            }

            .-right-40 {
                right: -10rem
            }

            .-right-60 {
                right: -15rem
            }

            .-right-9 {
                right: -2.25rem
            }

            .-top-14 {
                top: -3.5rem
            }

            .-top-24 {
                top: -6rem
            }

            .bottom-0 {
                bottom: 0
            }

            .bottom-14 {
                bottom: 3.5rem
            }

            .left-0 {
                left: 0
            }

            .right-0 {
                right: 0
            }

            .top-0 {
                top: 0
            }

            .top-16 {
                top: 4rem
            }

            .z-10 {
                z-index: 10
            }

            .mx-auto {
                margin-left: auto;
                margin-right: auto
            }

            .-mt-52 {
                margin-top: -13rem
            }

            .mb-12 {
                margin-bottom: 3rem
            }

            .mb-2 {
                margin-bottom: .5rem
            }

            .mb-4 {
                margin-bottom: 1rem
            }

            .mb-6 {
                margin-bottom: 1.5rem
            }

            .mb-8 {
                margin-bottom: 2rem
            }

            .mt-12 {
                margin-top: 3rem
            }

            .mt-24 {
                margin-top: 6rem
            }

            .mt-4 {
                margin-top: 1rem
            }

            .mt-8 {
                margin-top: 2rem
            }

            .flex {
                display: flex
            }

            .grid {
                display: grid
            }

            .hidden {
                display: none
            }

            .aspect-square {
                aspect-ratio: 1/1
            }

            .h-0 {
                height: 0
            }

            .h-10 {
                height: 2.5rem
            }

            .h-16 {
                height: 4rem
            }

            .h-20 {
                height: 5rem
            }

            .h-\[145px\] {
                height: 145px
            }

            .h-\[400px\] {
                height: 400px
            }

            .h-full {
                height: 100%
            }

            .w-0 {
                width: 0
            }

            .w-10 {
                width: 2.5rem
            }

            .w-16 {
                width: 4rem
            }

            .w-20 {
                width: 5rem
            }

            .w-3\/4 {
                width: 75%
            }

            .w-\[190px\] {
                width: 190px
            }

            .w-\[30\%\] {
                width: 30%
            }

            .w-\[400px\] {
                width: 400px
            }

            .w-full {
                width: 100%
            }

            .flex-1 {
                flex: 1 1 0%
            }

            .grid-cols-1 {
                grid-template-columns: repeat(1,minmax(0,1fr))
            }

            .grid-cols-2 {
                grid-template-columns: repeat(2,minmax(0,1fr))
            }

            .flex-row {
                flex-direction: row
            }

            .flex-col {
                flex-direction: column
            }

            .items-center {
                align-items: center
            }

            .justify-center {
                justify-content: center
            }

            .justify-between {
                justify-content: space-between
            }

            .gap-y-12 {
                row-gap: 3rem
            }

            .space-x-4>:not([hidden])~:not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(1rem * var(--tw-space-x-reverse));
                margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)))
            }

            .space-x-8>:not([hidden])~:not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(2rem * var(--tw-space-x-reverse));
                margin-left: calc(2rem * calc(1 - var(--tw-space-x-reverse)))
            }

            .space-y-2>:not([hidden])~:not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(.5rem * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(.5rem * var(--tw-space-y-reverse))
            }

            .space-y-4>:not([hidden])~:not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(1rem * var(--tw-space-y-reverse))
            }

            .overflow-hidden {
                overflow: hidden
            }

            .overflow-visible {
                overflow: visible
            }

            .break-words {
                overflow-wrap: break-word
            }

            .rounded {
                border-radius: .25rem
            }

            .rounded-2xl {
                border-radius: 1rem
            }

            .rounded-3xl {
                border-radius: 1.5rem
            }

            .rounded-full {
                border-radius: 9999px
            }

            .border {
                border-width: 1px
            }

            .border-\[100px\] {
                border-width: 100px
            }

            .border-\[60px\] {
                border-width: 60px
            }

            .border-fuchsia-100 {
                --tw-border-opacity: 1;
                border-color: rgb(250 232 255 / var(--tw-border-opacity))
            }

            .border-transparent {
                border-color: transparent
            }

            .border-white {
                --tw-border-opacity: 1;
                border-color: rgb(255 255 255 / var(--tw-border-opacity))
            }

            .border-b-fuchsia-950 {
                --tw-border-opacity: 1;
                border-bottom-color: rgb(74 4 78 / var(--tw-border-opacity))
            }

            .border-l-fuchsia-950 {
                --tw-border-opacity: 1;
                border-left-color: rgb(74 4 78 / var(--tw-border-opacity))
            }

            .bg-blue-100 {
                --tw-bg-opacity: 1;
                background-color: rgb(219 234 254 / var(--tw-bg-opacity))
            }

            .bg-fuchsia-50 {
                --tw-bg-opacity: 1;
                background-color: rgb(253 244 255 / var(--tw-bg-opacity))
            }

            .bg-fuchsia-950 {
                --tw-bg-opacity: 1;
                background-color: rgb(74 4 78 / var(--tw-bg-opacity))
            }

            .bg-orange-100 {
                --tw-bg-opacity: 1;
                background-color: rgb(255 237 213 / var(--tw-bg-opacity))
            }

            .bg-rose-100 {
                --tw-bg-opacity: 1;
                background-color: rgb(255 228 230 / var(--tw-bg-opacity))
            }

            .bg-teal-100 {
                --tw-bg-opacity: 1;
                background-color: rgb(204 251 241 / var(--tw-bg-opacity))
            }

            .bg-violet-100 {
                --tw-bg-opacity: 1;
                background-color: rgb(237 233 254 / var(--tw-bg-opacity))
            }

            .bg-white {
                --tw-bg-opacity: 1;
                background-color: rgb(255 255 255 / var(--tw-bg-opacity))
            }

            .bg-\[radial-gradient\(\#cccccc_3px\2c transparent_3px\)\] {
                background-image: radial-gradient(#ccc 3px,transparent 3px)
            }

            .object-cover {
                -o-object-fit: cover;
                object-fit: cover
            }

            .p-2 {
                padding: .5rem
            }

            .p-6 {
                padding: 1.5rem
            }

            .p-8 {
                padding: 2rem
            }

            .px-4 {
                padding-left: 1rem;
                padding-right: 1rem
            }

            .px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }

            .py-10 {
                padding-top: 2.5rem;
                padding-bottom: 2.5rem
            }

            .py-16 {
                padding-top: 4rem;
                padding-bottom: 4rem
            }

            .py-2 {
                padding-top: .5rem;
                padding-bottom: .5rem
            }

            .py-20 {
                padding-top: 5rem;
                padding-bottom: 5rem
            }

            .py-3 {
                padding-top: .75rem;
                padding-bottom: .75rem
            }

            .py-4 {
                padding-top: 1rem;
                padding-bottom: 1rem
            }

            .pb-0 {
                padding-bottom: 0
            }

            .pb-4 {
                padding-bottom: 1rem
            }

            .pt-12 {
                padding-top: 3rem
            }

            .pt-36 {
                padding-top: 9rem
            }

            .pt-4 {
                padding-top: 1rem
            }

            .text-center {
                text-align: center
            }

            .font-\[\'Poppins\'\]{font-family:Poppins}.text-2xl{font-size:1.5rem;line-height:2rem}.text-3xl{font-size:1.875rem;line-height:2.25rem}.text-4xl{font-size:2.25rem;line-height:2.5rem}.text-lg{font-size:1.125rem;line-height:1.75rem}.text-sm{font-size:.875rem;line-height:1.25rem}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-xs{font-size:.75rem;line-height:1rem}.font-bold{font-weight:700}.font-light{font-weight:300}.font-semibold{font-weight:600}.uppercase{text-transform:uppercase}.text-blue-500{--tw-text-opacity:1;color:rgb(59 130 246 / var(--tw-text-opacity))}.text-fuchsia-950{--tw-text-opacity:1;color:rgb(74 4 78 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-800{--tw-text-opacity:1;color:rgb(31 41 55 / var(--tw-text-opacity))}.text-orange-500{--tw-text-opacity:1;color:rgb(249 115 22 / var(--tw-text-opacity))}.text-rose-500{--tw-text-opacity:1;color:rgb(244 63 94 / var(--tw-text-opacity))}.text-teal-500{--tw-text-opacity:1;color:rgb(20 184 166 / var(--tw-text-opacity))}.text-violet-500{--tw-text-opacity:1;color:rgb(139 92 246 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.shadow-\[0_0_25px_rgba\(0\2c 0\2c 0\2c 0\.1\)\]{--tw-shadow:0 0 25px rgba(0,0,0,0.1);--tw-shadow-colored:0 0 25px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)}.\[background-size\:16px_16px\]{background-size:16px 16px}@media (min-width:1024px){.lg\:container{width:100%}@media (min-width:640px){.lg\:container{max-width:640px}}@media (min-width:768px){.lg\:container{max-width:768px}}@media (min-width:1024px){.lg\:container{max-width:1024px}}@media (min-width:1280px){.lg\:container{max-width:1280px}}@media (min-width:1536px){.lg\:container{max-width:1536px}}}@media (min-width:640px){.sm\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.sm\:px-12{padding-left:3rem;padding-right:3rem}}@media (min-width:768px){.md\:flex{display:flex}.md\:hidden{display:none}.md\:max-w-xs{max-width:20rem}.md\:grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.md\:grid-cols-4{grid-template-columns:repeat(4,minmax(0,1fr))}}@media (min-width:1024px){.lg\:mt-0{margin-top:0}.lg\:mt-24{margin-top:6rem}.lg\:block{display:block}.lg\:w-\[45\%\]{width:45%}.lg\:w-\[55\%\]{width:55%}.lg\:flex-row{flex-direction:row}.lg\:space-x-8>:not([hidden])~:not([hidden]){--tw-space-x-reverse:0;margin-right:calc(2rem * var(--tw-space-x-reverse));margin-left:calc(2rem * calc(1 - var(--tw-space-x-reverse)))}.lg\:p-6{padding:1.5rem}.lg\:pb-32{padding-bottom:8rem}.lg\:pr-14{padding-right:3.5rem}.lg\:text-left{text-align:left}.lg\:text-3xl{font-size:1.875rem;line-height:2.25rem}.lg\:text-base{font-size:1rem;line-height:1.5rem}}@media (min-width:1280px){.xl\:block{display:block}.xl\:w-\[70\%\]{width:70%}.xl\:px-32{padding-left:8rem;padding-right:8rem}.xl\:text-4xl{font-size:2.25rem;line-height:2.5rem}.xl\:text-5xl{font-size:3rem;line-height:1}.xl\:text-base{font-size:1rem;line-height:1.5rem}.xl\:font-light{font-weight:300}.xl\:font-normal{font-weight:400}}@media (min-width:1536px){.\32xl\:pr-\[30\%\]{padding-right:30%}.\32xl\:text-5xl{font-size:3rem;line-height:1}.\32xl\:text-6xl{font-size:3.75rem;line-height:1}}</style>
    </head>
    <body>
        
            
        </div>
        <header id="top" class="primary-color-bg primary-color-[50] code-section font-['Poppins'] bg-fuchsia-50">
            <nav class="container relative z-10 mx-auto px-4 py-10 sm:px-12 xl:px-32">
                <div class="flex items-center justify-between">
                    <div class="text-xl font-bold">
                        <a id="nav-name-text" href="/" class="primary-color-text text-xl lg:text-3xl text-fuchsia-950">Project Management System</a>
                    </div>
                    <div id="nav-links" class="hidden items-center space-x-8 text-sm md:flex lg:text-base">
                        <a href="index.php" class="text-gray-800 xl:text-base xl:font-normal">Home</a>
                        <a href="admin/login.php" class="text-gray-800">Admin</a>
                        <a href="employee/login.php" class="text-gray-800">Employee</a>
                    </div>
                    <div id="nav-cta" class="hidden items-center space-x-4 text-sm md:flex lg:text-base">
                        <div id="nav-cta-button">
                            <a href="#contact" class="primary-color-bg rounded px-8 py-3 text-xs uppercase text-white bg-fuchsia-950">Contact Us</a>
                        </div>
                    </div>
                    <div id="mobile-menu-icon" class="flex items-center md:hidden">
                        <button class="text-gray-800" aria-label="Navigation Dropdown Menu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                </div>
                <div id="nav-links-mobile" class="mt-4 hidden md:hidden">
                    <div class="relative z-10 flex flex-col space-y-2 bg-white pb-4 text-center text-lg">
                        <a href="/#services" class="text-gray-800">Services</a>
                        <a href="/#portfolio" class="text-gray-800">Portfolio</a>
                        <a href="/#pricing" class="text-gray-800">Pricing</a>
                        <div id="nav-mobile-cta-button" class="flex-col space-y-2 pt-4">
                            <div id="nav-cta-button">
                                <a href="/#contact" class="primary-color-bg px-4 py-2 text-white bg-fuchsia-950">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <section class="primary-color-bg primary-color-[50] code-section relative font-['Poppins'] bg-fuchsia-50" id="shlktxm">
            <div class="container relative z-10 mx-auto px-4 sm:px-12 lg:pb-32 xl:px-32">
                <div class="relative z-10 flex flex-col items-center lg:flex-row">
                    <div class="mt-12 w-full lg:mt-24 lg:w-[55%] lg:pr-14">
                        <h1 id="hero-text" class="mb-8 text-center text-4xl font-bold lg:text-left xl:text-5xl 2xl:text-6xl">
                            <div id="hero-action-1" class="">Simplify Tasks</div>
                            <div id="hero-action-2" class="primary-color-text text-fuchsia-950">Boost Efficiency</div>
                            <div id="hero-action-3" class="">Achieve Goals</div>
                        </h1>
                        <p id="hero-subtext" class="mb-8 text-center text-gray-700 lg:text-left">Our platform provides a comprehensive overview of every project, streamlining your task management process effortlessly.</p>
                        <div id="hero-cta-button" class="mb-12 text-center lg:text-left"></div>
                    </div>
                    <div class="relative mt-12 hidden w-full overflow-visible lg:block lg:w-[45%] lg:p-6">
                        <div class="primary-color-border absolute bottom-0 left-0 h-0 w-0 border-[100px] border-transparent border-b-fuchsia-950 border-l-fuchsia-950"></div>
                        <div class="absolute -right-9 top-16 h-[145px] w-[190px] bg-[radial-gradient(#cccccc_3px,transparent_3px)] [background-size:16px_16px]"></div>
                        <img src="https://images.unsplash.com/photo-1611095564985-89765398121e?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3w0MzEzMzd8MHwxfHNlYXJjaHwyfHxidXNpbmVlc3xlbnwwfDB8fHwxNzIwMDc4NTE4fDA&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1920" alt="Hero" class="seo-image relative mt-8 aspect-square w-full rounded-2xl object-cover lg:mt-0 dont-replace" data-media="{&quot;id&quot;:&quot;V7dZJybxhgc&quot;,&quot;src&quot;:&quot;unsplash&quot;,&quot;type&quot;:&quot;image&quot;}" oncontextmenu="return false;">
                    </div>
                </div>
            </div>
            <div class="primary-color-border primary-color-[100] absolute -left-56 -top-24 h-[400px] w-[400px] rounded-full border-[60px] border-fuchsia-100"></div>
            <div class="absolute bottom-0 top-0 hidden h-full w-full overflow-hidden lg:block">
                <div class="primary-color-border primary-color-[100] absolute -right-60 bottom-14 h-[400px] w-[400px] rounded-full border-[60px] border-fuchsia-100"></div>
            </div>
        </section>
        <section id="services" class="code-section bg-white py-20 font-['Poppins']">
            <div class="container mx-auto px-4 sm:px-12 xl:px-32 xl:font-light">
                <h2 id="services-header" class="mb-8 text-center text-3xl font-bold xl:text-4xl 2xl:text-5xl text-fuchsia-950">About Us</h2>
                <h3 id="services-subtext" class="mx-auto mb-12 w-3/4 text-center text-gray-700 font-light xl:font-light" style="font-family: Poppins;">
                    &nbsp;<span style="color: rgb(0, 0, 0); font-family: Poppins; font-size: 16px; text-align: left;" class="xl:text-base xl:font-light">Stantec is a global leader in sustainable architecture, engineering, and environmental consulting. The diverse perspectives of our partners and interested parties drive us to think beyond what’s previously been done on critical issues like climate change, digital transformation, and future-proofing our cities and infrastructure.</span>
                </h3>
                <div class="flex flex-row">
                    <div class="hidden w-[30%] xl:block">
                        <img src="https://images.unsplash.com/photo-1563089145-599997674d42?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3w0MzEzMzd8MHwxfHNlYXJjaHwyfHxBYnN0cmFjdHxlbnwwfDB8fHwxNzIwMDc3NDgyfDA&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1920" alt="Hero" class="relative mt-8 h-full rounded-2xl object-cover lg:mt-0 dont-replace" data-media="{&quot;id&quot;:&quot;9XngoIpxcEo&quot;,&quot;src&quot;:&quot;unsplash&quot;,&quot;type&quot;:&quot;image&quot;}" oncontextmenu="return false;">
                    </div>
                    <div class="grid w-full grid-cols-2 gap-y-12 md:grid-cols-3 xl:w-[70%]">
                        <div id="service-1" class="flex-1 bg-white px-8 text-center md:max-w-xs">
                            <div id="service-1-icon" class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-3xl bg-blue-100 text-4xl text-blue-500">
                                <i class="fa-duotone fa-tasks" aria-hidden="true"></i>
                            </div>
                            <h4 id="service-1-header" class="mb-4 text-2xl font-semibold text-fuchsia-950">Project Tracking</h4>
                            <p id="service-1-text" class="text-gray-700">Easily track and manage all your tasks with our intuitive task tracking system, ensuring nothing falls through the cracks.</p>
                        </div>
                        <div id="service-2" class="flex-1 bg-white px-8 text-center md:max-w-xs">
                            <div id="service-2-icon" class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-3xl bg-orange-100 text-4xl text-orange-500">
                                <i class="fa-duotone fa-project-diagram" aria-hidden="true"></i>
                            </div>
                            <h4 id="service-2-header" class="mb-4 text-2xl font-semibold text-fuchsia-950">Project Overview</h4>
                            <p id="service-2-text" class="text-gray-700">Get a detailed and comprehensive overview of all your projects in one place, making it easier to monitor progress and deadlines.</p>
                        </div>
                        <div id="service-3" class="flex-1 bg-white px-8 text-center md:max-w-xs">
                            <div id="service-3-icon" class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-3xl bg-rose-100 text-4xl text-rose-500">
                                <i class="fa-duotone fa-users" aria-hidden="true"></i>
                            </div>
                            <h4 id="service-3-header" class="mb-2 text-2xl font-semibold text-fuchsia-950">Team Collaboration</h4>
                            <p id="service-3-text" class="text-gray-700">Enhance team collaboration with tools designed for seamless communication and task delegation among team members.</p>
                        </div>
                        <div id="service-4" class="flex-1 bg-white px-8 text-center md:max-w-xs">
                            <div id="service-4-icon" class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-teal-100 text-4xl text-teal-500">
                                <i class="fa-duotone fa-chart-line" aria-hidden="true"></i>
                            </div>
                            <h4 id="service-4-header" class="mb-2 text-2xl font-semibold text-fuchsia-950">Performance Insights</h4>
                            <p id="service-4-text" class="break-words text-gray-700">Gain valuable insights into team performance and project progress with our analytical tools, helping you make informed decisions.</p>
                        </div>
                        <div id="service-5" class="flex-1 bg-white px-8 text-center md:max-w-xs">
                            <div id="service-5-icon" class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-blue-100 text-4xl text-blue-500">
                                <i class="fa-duotone fa-user-tie" aria-hidden="true"></i>
                            </div>
                            <h4 id="service-5-header" class="mb-2 text-2xl font-semibold text-fuchsia-950">Employee Overview</h4>
                            <p id="service-5-text" class="text-gray-700">Stay up-to-date with real-time notifications about task updates, deadlines, and other important project milestones.</p>
                        </div>
                        <div id="service-6" class="flex-1 bg-white px-8 text-center md:max-w-xs">
                            <div id="service-6-icon" class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-violet-100 text-4xl text-violet-500">
                                <i class="fa-duotone fa-mobile-alt" aria-hidden="true"></i>
                            </div>
                            <h4 id="service-6-header" class="mb-2 text-2xl font-semibold text-fuchsia-950">Mobile Access</h4>
                            <p id="service-6-text" class="text-gray-700">Access your projects and manage tasks on-the-go with our mobile-friendly interface, ensuring productivity from anywhere.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact" class="code-section font-['Poppins']">
            <div class="mx-auto px-4 py-20 lg:container sm:px-12 xl:px-32">
                <div class="relative z-10 rounded-3xl bg-white p-6 shadow-[0_0_25px_rgba(0,0,0,0.1)]">
                    <div class="flex flex-col lg:flex-row lg:space-x-8">
                        <div class="primary-color-bg rounded-3xl p-8 pt-12 text-white bg-fuchsia-950">
                            <div class="mb-4 uppercase">Contact Us</div>
                            <div class="mb-6 text-4xl font-semibold">
                                <i class="fas fa-comment-dots" aria-hidden="true"></i>
                                Let's talk
                            </div>
                            <div class="hidden py-4 lg:block">
                                <div class="mb-6 flex flex-row space-x-4">
                                    <div class="flex h-16 w-16 items-center justify-center rounded-full border border-white p-6">
                                        <i class="fa-duotone fa-location-dot text-3xl" aria-hidden="true"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="text-2xl font-semibold">Our Location</div>
                                        <div id="contact-location" class="">&nbsp;1st floor, MSM 2 Building Al Safa First Umm Al Sheif Area-Dubai</div>
                                    </div>
                                </div>
                                <div class="mb-6 flex flex-row space-x-4">
                                    <div class="flex h-16 w-16 items-center justify-center rounded-full border border-white p-6">
                                        <i class="fa-duotone fa-envelope text-3xl" aria-hidden="true"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="text-2xl font-semibold">Email Address</div>
                                        <div id="contact-email" class="">
                                            <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ee87808881ae9a8f9d85838f808f898b838b809a9d979d9a8b83c08d8183">[email &#160;protected]</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-row space-x-4">
                                    <div class="flex h-16 w-16 items-center justify-center rounded-full border border-white p-6">
                                        <i class="fa-duotone fa-phone text-3xl" aria-hidden="true"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="text-2xl font-semibold">Telephone</div>
                                        <div id="contact-phone-number" class="">(123) 456-7890</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full p-6">
                            <img src="https://landingsite-app-public.s3.us-east-2.amazonaws.com/client-files/291de0e9-ed80-4cd2-a1fa-cc5dd7169c27" alt="Task management related image" class="rounded-3xl shadow-[0_0_25px_rgba(0,0,0,0.1)] dont-replace" data-media="{&quot;src&quot;:&quot;upload&quot;,&quot;type&quot;:&quot;image&quot;}" oncontextmenu="return false;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="primary-color-bg primary-color-[50] code-section relative -mt-52 overflow-hidden py-16 font-['Poppins'] bg-fuchsia-50" id="sbr462">
            <div id="footer" class="container relative mx-auto px-4 pb-0 pt-36 sm:px-12 xl:px-32">
                <div class="primary-color-border primary-color-[100] absolute -left-80 -top-14 h-[400px] w-[400px] rounded-full border-[60px] border-fuchsia-100"></div>
                <div class="primary-color-border primary-color-[100] absolute -right-40 bottom-0 h-[400px] w-[400px] rounded-full border-[60px] border-fuchsia-100"></div>
                <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden"></div>
                <div class="relative z-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4">
                    <div class="mb-8 flex flex-col space-y-4">
                        <a id="footer-brand-name" href="/" class="primary-color-text mb-8 text-xl font-bold lg:text-3xl text-fuchsia-950">Task Management System</a>
                        <div id="footer-name-subtext" class="text-gray-700 2xl:pr-[30%]">Task Management System offers comprehensive project oversight with intuitive tools for effective company-wide task management.</div>
                    </div>
                    <div id="footer-nav-links" class="mb-8 flex flex-col space-y-4">
                        <div class="mb-8 text-2xl font-semibold">Navigation</div>
                        <a class="text-gray-700" href="index.php">Home</a>
                        <a class="text-gray-700" href="#services">About Us</a>
                        <a class="text-gray-700" href="admin/login.php">Admin</a>
                        <a class="text-gray-700" href="employee/login.php">Employee</a>
                        <a class="text-gray-700" href="#contact">Contact</a>
                    </div>
                    <div class="mb-8 flex flex-col space-y-4">
                        <div class="mb-8 text-2xl font-semibold">Services</div>
                        <div id="footer-services" class="flex flex-col space-y-4 text-gray-700">
                            <div class="">Task Tracking</div>
                            <div class="">Project Overview</div>
                            <div class="">Team Collaboration</div>
                            <div class="">Performance Insights</div>
                            <div class="">Employee Overview</div>
                            <div class="">Mobile Access</div>
                        </div>
                    </div>
                    <div id="footer-contact-info" class="mb-8 flex flex-col space-y-4">
                        <div class="mb-8 text-2xl font-semibold">Contact Us</div>
                        <div class="flex flex-row">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full p-2">
                                <i class="primary-color-text fa-regular fa-phone text-xl text-fuchsia-950" aria-hidden="true"></i>
                            </div>
                            <div id="footer-phone-number" class="flex items-center">(123) 456-7890</div>
                        </div>
                        <div class="flex flex-row">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full p-2">
                                <i class="primary-color-text fa-regular fa-envelope text-xl text-fuchsia-950" aria-hidden="true"></i>
                            </div>
                            <div id="footer-email" class="flex items-center">
                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="234a4d454c63574250484e424d4244464e464d57505a5057464e0d404c4e">[email &#160;protected]</a>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full p-2">
                                <i class="primary-color-text fa-regular fa-location-dot text-xl text-fuchsia-950" aria-hidden="true"></i>
                            </div>
                            <div id="footer-location" class="flex items-center">1234 Main Street, Anytown, AN 12345</div>
                        </div>
                    </div>
                </div>
                <p id="footer-copyright" class="relative z-10 mt-24 text-center text-lg text-gray-600">© Task Management System 2024.</p>
            </div>
        </footer>
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script>
            var mobileIcon = document.getElementById("mobile-menu-icon");
            function setupFormSubmission(e) {
                e = document.getElementById(e);
                e && e.addEventListener("submit", function(e) {
                    e.preventDefault();
                    for (var t, n, o = e.target.elements, i = {}, r = 0; r < o.length; r++)
                        "submit" === o[r].type ? t = o[r] : i[o[r].name] = o[r].value;
                    t ? (n = t.innerText,
                    i.analyticsId = window.LANDING_SITE_ID,
                    t.innerText = "Sending...",
                    fetch(window.LANDING_SITE_CONTACT_US_URL, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(i)
                    }).then(function(e) {
                        if (console.log(e),
                        e.ok) {
                            t.innerText = "Done!";
                            for (var n = 0; n < o.length; n++)
                                "submit" !== o[n].type && (o[n].value = "")
                        } else
                            t.innerText = "Error. Please try again."
                    }).catch(e=>{
                        console.error("Error:", e)
                    }
                    ).finally(function() {
                        setTimeout(function() {
                            t.innerText = n
                        }, 4e3)
                    })) : console.error("No submit button found.")
                })
            }
            mobileIcon && mobileIcon.addEventListener("click", function() {
                document.getElementById("nav-links-mobile").classList.toggle("hidden")
            }),
            setupFormSubmission("contact-us-form");
        </script>
        <script defer src="https://kit.fontawesome.com/8e98006f77.js" crossorigin="anonymous"></script>
    </body>
</html>
