<?php
    include "includes/header.php";
    include "includes/aside.php";
    include "functions/load-stastics.php";
?>

    <!-- main section -->
    <main class="p-4 sm:ml-64">
        <!-- filter section -->
        <section class="mt-14">
            <!-- stastics card -->
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div class="relative flex flex-col py-3 border border-gray-200 bg-white shadow dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Total Assets</p>
                                        <h5 class="mt-2 mb-2 font-bold dark:text-white"><?= $total_asset ?></h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div class="inline-flex w-12 h-12 items-center justify-center rounded-full bg-gradient-to-tl from-blue-500 to-violet-500">
                                        <svg class="w-8 h-8 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M467.4 224c-19.6 0-37.6-6.5-52.1-17.2c-4.7-3.5-9.1-7.4-13-11.8c-3.9 4.3-8.2 8.2-12.9 11.7c-14.5 10.8-32.5 17.3-52.3 17.3c-19.6 0-37.5-6.4-52-17c-4.8-3.5-9.2-7.5-13.2-11.9c-4 4.4-8.4 8.4-13.2 12c-14.4 10.6-32.4 17-52 17c-19.6 0-37.5-6.4-52-17c-4.8-3.5-9.2-7.5-13.2-11.9c-4 4.4-8.4 8.4-13.2 11.9c-14.4 10.6-32.4 17-52 17c0 0 0 0 0 0c-4 0-8.1-.3-12.1-.8c-55.3-7.4-81.5-72.6-51.9-119.4L80 0H464l67.6 103.8c29.7 46.9 3.4 112-52.1 119.4c-4 .5-7.9 .8-12.1 .8c0 0 0 0 0 0zm-391-48c11.8 0 22.3-5.1 29.6-13.2l35.6-39.4 35.6 39.4c7.3 8.1 17.8 13.2 29.6 13.2c11.8 0 22.3-5.1 29.6-13.2l35.6-39.4 35.6 39.4c7.3 8.1 17.8 13.2 29.6 13.2c11.9 0 22.3-5.1 29.6-13.2l35.5-39.3 35.6 39.2c7.4 8.2 18 13.2 29.7 13.2c2 0 3.8-.1 5.8-.4c9-1.2 16.1-6.8 20.1-16c4.1-9.5 3.6-20.7-2.1-29.9L438 48H106L52.8 129.7c-5.7 9.1-6.2 20.3-2.1 29.9c3.9 9.3 11 14.8 19.9 16c2 .3 4 .4 5.8 .4zM96 336H448V254.4c6.3 1 12.8 1.6 19.4 1.6c5.6 0 10.9-.4 16.2-1.1l.1 0c4.2-.6 8.3-1.3 12.3-2.3V336v48 80 48H448 96 48V464 384 336 252.6c3.9 1 7.9 1.7 12 2.3l.1 0c5.3 .7 10.7 1.1 16.3 1.1c6.7 0 13.3-.6 19.6-1.6V336zm352 48H96v80H448V384z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div class="relative flex flex-col py-3 border border-gray-200 bg-white shadow dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Total Location</p>
                                        <h5 class="mt-2 mb-2 font-bold dark:text-white"><?= $total_location ?></h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div class="inline-flex w-12 h-12 items-center justify-center rounded-full bg-gradient-to-tl from-blue-500 to-violet-500">
                                        <svg class="w-8 h-8 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M467.4 224c-19.6 0-37.6-6.5-52.1-17.2c-4.7-3.5-9.1-7.4-13-11.8c-3.9 4.3-8.2 8.2-12.9 11.7c-14.5 10.8-32.5 17.3-52.3 17.3c-19.6 0-37.5-6.4-52-17c-4.8-3.5-9.2-7.5-13.2-11.9c-4 4.4-8.4 8.4-13.2 12c-14.4 10.6-32.4 17-52 17c-19.6 0-37.5-6.4-52-17c-4.8-3.5-9.2-7.5-13.2-11.9c-4 4.4-8.4 8.4-13.2 11.9c-14.4 10.6-32.4 17-52 17c0 0 0 0 0 0c-4 0-8.1-.3-12.1-.8c-55.3-7.4-81.5-72.6-51.9-119.4L80 0H464l67.6 103.8c29.7 46.9 3.4 112-52.1 119.4c-4 .5-7.9 .8-12.1 .8c0 0 0 0 0 0zm-391-48c11.8 0 22.3-5.1 29.6-13.2l35.6-39.4 35.6 39.4c7.3 8.1 17.8 13.2 29.6 13.2c11.8 0 22.3-5.1 29.6-13.2l35.6-39.4 35.6 39.4c7.3 8.1 17.8 13.2 29.6 13.2c11.9 0 22.3-5.1 29.6-13.2l35.5-39.3 35.6 39.2c7.4 8.2 18 13.2 29.7 13.2c2 0 3.8-.1 5.8-.4c9-1.2 16.1-6.8 20.1-16c4.1-9.5 3.6-20.7-2.1-29.9L438 48H106L52.8 129.7c-5.7 9.1-6.2 20.3-2.1 29.9c3.9 9.3 11 14.8 19.9 16c2 .3 4 .4 5.8 .4zM96 336H448V254.4c6.3 1 12.8 1.6 19.4 1.6c5.6 0 10.9-.4 16.2-1.1l.1 0c4.2-.6 8.3-1.3 12.3-2.3V336v48 80 48H448 96 48V464 384 336 252.6c3.9 1 7.9 1.7 12 2.3l.1 0c5.3 .7 10.7 1.1 16.3 1.1c6.7 0 13.3-.6 19.6-1.6V336zm352 48H96v80H448V384z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div class="relative flex flex-col py-3 border border-gray-200 bg-white shadow dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Total Mfg</p>
                                        <h5 class="mt-2 mb-2 font-bold dark:text-white"><?= $total_mfg ?></h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div class="inline-flex w-12 h-12 items-center justify-center rounded-full bg-gradient-to-tl from-blue-500 to-violet-500">
                                        <svg class="w-8 h-8 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M467.4 224c-19.6 0-37.6-6.5-52.1-17.2c-4.7-3.5-9.1-7.4-13-11.8c-3.9 4.3-8.2 8.2-12.9 11.7c-14.5 10.8-32.5 17.3-52.3 17.3c-19.6 0-37.5-6.4-52-17c-4.8-3.5-9.2-7.5-13.2-11.9c-4 4.4-8.4 8.4-13.2 12c-14.4 10.6-32.4 17-52 17c-19.6 0-37.5-6.4-52-17c-4.8-3.5-9.2-7.5-13.2-11.9c-4 4.4-8.4 8.4-13.2 11.9c-14.4 10.6-32.4 17-52 17c0 0 0 0 0 0c-4 0-8.1-.3-12.1-.8c-55.3-7.4-81.5-72.6-51.9-119.4L80 0H464l67.6 103.8c29.7 46.9 3.4 112-52.1 119.4c-4 .5-7.9 .8-12.1 .8c0 0 0 0 0 0zm-391-48c11.8 0 22.3-5.1 29.6-13.2l35.6-39.4 35.6 39.4c7.3 8.1 17.8 13.2 29.6 13.2c11.8 0 22.3-5.1 29.6-13.2l35.6-39.4 35.6 39.4c7.3 8.1 17.8 13.2 29.6 13.2c11.9 0 22.3-5.1 29.6-13.2l35.5-39.3 35.6 39.2c7.4 8.2 18 13.2 29.7 13.2c2 0 3.8-.1 5.8-.4c9-1.2 16.1-6.8 20.1-16c4.1-9.5 3.6-20.7-2.1-29.9L438 48H106L52.8 129.7c-5.7 9.1-6.2 20.3-2.1 29.9c3.9 9.3 11 14.8 19.9 16c2 .3 4 .4 5.8 .4zM96 336H448V254.4c6.3 1 12.8 1.6 19.4 1.6c5.6 0 10.9-.4 16.2-1.1l.1 0c4.2-.6 8.3-1.3 12.3-2.3V336v48 80 48H448 96 48V464 384 336 252.6c3.9 1 7.9 1.7 12 2.3l.1 0c5.3 .7 10.7 1.1 16.3 1.1c6.7 0 13.3-.6 19.6-1.6V336zm352 48H96v80H448V384z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div class="relative flex flex-col py-3 border border-gray-200 bg-white shadow dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Total Users</p>
                                        <h5 class="mt-2 mb-2 font-bold dark:text-white"><?= $total_user ?></h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div class="inline-flex w-12 h-12 items-center justify-center rounded-full bg-gradient-to-tl from-blue-500 to-violet-500">
                                        <svg class="w-8 h-8 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M467.4 224c-19.6 0-37.6-6.5-52.1-17.2c-4.7-3.5-9.1-7.4-13-11.8c-3.9 4.3-8.2 8.2-12.9 11.7c-14.5 10.8-32.5 17.3-52.3 17.3c-19.6 0-37.5-6.4-52-17c-4.8-3.5-9.2-7.5-13.2-11.9c-4 4.4-8.4 8.4-13.2 12c-14.4 10.6-32.4 17-52 17c-19.6 0-37.5-6.4-52-17c-4.8-3.5-9.2-7.5-13.2-11.9c-4 4.4-8.4 8.4-13.2 11.9c-14.4 10.6-32.4 17-52 17c0 0 0 0 0 0c-4 0-8.1-.3-12.1-.8c-55.3-7.4-81.5-72.6-51.9-119.4L80 0H464l67.6 103.8c29.7 46.9 3.4 112-52.1 119.4c-4 .5-7.9 .8-12.1 .8c0 0 0 0 0 0zm-391-48c11.8 0 22.3-5.1 29.6-13.2l35.6-39.4 35.6 39.4c7.3 8.1 17.8 13.2 29.6 13.2c11.8 0 22.3-5.1 29.6-13.2l35.6-39.4 35.6 39.4c7.3 8.1 17.8 13.2 29.6 13.2c11.9 0 22.3-5.1 29.6-13.2l35.5-39.3 35.6 39.2c7.4 8.2 18 13.2 29.7 13.2c2 0 3.8-.1 5.8-.4c9-1.2 16.1-6.8 20.1-16c4.1-9.5 3.6-20.7-2.1-29.9L438 48H106L52.8 129.7c-5.7 9.1-6.2 20.3-2.1 29.9c3.9 9.3 11 14.8 19.9 16c2 .3 4 .4 5.8 .4zM96 336H448V254.4c6.3 1 12.8 1.6 19.4 1.6c5.6 0 10.9-.4 16.2-1.1l.1 0c4.2-.6 8.3-1.3 12.3-2.3V336v48 80 48H448 96 48V464 384 336 252.6c3.9 1 7.9 1.7 12 2.3l.1 0c5.3 .7 10.7 1.1 16.3 1.1c6.7 0 13.3-.6 19.6-1.6V336zm352 48H96v80H448V384z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- stastics graph -->
            <div class="w-full max-w-full mt-3  lg:flex-none border border-gray-200 rounded-lg bg-white shadow">
                <div class="dark:bg-slate-850 dark:shadow-dark-xl  relative z-20 flex min-w-0 flex-col">
                    <div class="p-6 pt-4 pb-0">
                        <h6 class="font-semibold text-xl text-gray-900">Overview</h6>
                        <p class="mb-0 text-sm text-gray-700">
                            <span class="font-normal">4% more</span> in 2022
                        </p>
                    </div>
                    <div class="flex-auto p-4">
                        <div class="">
                            <div>
                                <canvas id="chart-line" height="600" width="1652" style="display: block; box-sizing: border-box; height: 300px; width: 826px;"></canvas>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="src/js/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>
</html>