<script setup>
// Load Dynamic Component
const { getComponent } = storeUserData()
function loadComponent(component) {
    getComponent(component)
}

const menuItems = [
    { label: 'Inventory', component: 'InventoryCreation' },
    { label: 'Item', component: 'ItemCreation' }
];


const component_id = ref(storeUserData().get_component || 'Overview')
watch(() => storeUserData().get_component, (value) => {
    component_id.value = value
})


const source_index = ref(null)
</script>

<template>
    <div>
        <!-- Left Side Start -->
        <aside id="logo-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 sidebar"
            aria-label="Sidebar">
            <div class="h-full px-3 pb-4 pt-4 overflow-y-auto bg-white dark:bg-gray-800">
                <a href="/" class="flex items-center ps-2.5 mb-5">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">TMS</span>
                </a>
                <ul class="space-y-2 font-medium">
                    <li v-for="menuItem in menuItems" :key="menuItem.component">
                        <a @click="loadComponent(menuItem.component)"
                            :class="{ 'bg-gray-100 dark:bg-gray-700': component_id === menuItem.component }"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 21">
                                <!-- SVG Path -->
                            </svg>
                            <span class="ms-3">{{ menuItem.label }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Left Side End -->
    </div>
</template>

<style></style>