<script setup>
import { Pagination, Navigation } from "swiper/modules";

const user_data = storeUserData().user_data;
const { locale, t } = useI18n();

</script>

<template>
  <div>
    <!-- <h1 class="text-2xl font-bold pb-3">{{ $t("System_Statistics") }}</h1> -->
    <div class="flex flex-wrap">
      <div class="w-full sm:w-1/2 lg:w-1/4 pr-3 pb-3">
        <a
          href="#"
          class="block max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"
        >
          <h5
            class="mb-2 font-bold tracking-tight text-gray-900 dark:text-white"
          >
          </h5>
          <div class="flex justify-between items-center py-2">
            <p class="text-4xl font-bold">63</p>
            <span>icon</span>
          </div>
          <p>15% decreased than last month</p>
        </a>
      </div>
    </div>
  </div>
</template>

<style></style>