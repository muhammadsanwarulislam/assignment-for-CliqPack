<script setup>
useHead({ title: "Dashboard" });
definePageMeta({ middleware: ["auth"] });

// Load Dynamic Component
const component_id = ref(storeUserData().get_component || "Overview");

const over_view           = resolveComponent("RightSideOverview");
const inventory_creation  = resolveComponent("RightSideInventoryCreation");
const item_creation       = resolveComponent("RightSideItemCreation");

const getComponent = computed(() => {
  switch (component_id.value) {
    case "Overview":
      return over_view;
    case "InventoryCreation":
      return inventory_creation;
    case "ItemCreation":
      return item_creation;
    default:
      return over_view;
  }
});

watch(
  () => storeUserData().get_component,
  (value) => {
    component_id.value = value;
    window.scrollTo(0, 0);
  }
);
</script>

<template>
  <div>
    <TopMenu :title="(title = 'dashboard')" />
    <div class="p-4 sm:ml-64 dashboard_close">
      <div class="p-4 rounded-lg dark:border-gray-700">
        <LeftSide />
        <ClientOnly>
          <KeepAlive>
            <component :is="getComponent" />
          </KeepAlive>
        </ClientOnly>
      </div>
    </div>
  </div>
</template>

<style></style>
