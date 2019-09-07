<router-link
    :to="{
        name: 'index',
        params: {
            resourceName: '{{ config('nova-activitylog.resource')::uriKey() }}'
        }
    }"
    tag="h3"
    class="cursor-pointer flex items-center font-normal dim text-white mb-6 text-base no-underline">
    <svg class="sidebar-icon" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
        <path  fill="var(--sidebar-icon)" fill-rule="evenodd" d="m433.941 65.941-51.882-51.882a48 48 0 0 0 -33.941-14.059h-172.118c-26.51 0-48 21.49-48 48v48h-80c-26.51 0-48 21.49-48 48v320c0 26.51 21.49 48 48 48h224c26.51 0 48-21.49 48-48v-48h80c26.51 0 48-21.49 48-48v-268.118a48 48 0 0 0 -14.059-33.941zm-167.941 398.059h-212a6 6 0 0 1 -6-6v-308a6 6 0 0 1 6-6h74v224c0 26.51 21.49 48 48 48h96v42a6 6 0 0 1 -6 6zm128-96h-212a6 6 0 0 1 -6-6v-308a6 6 0 0 1 6-6h106v88c0 13.255 10.745 24 24 24h88v202a6 6 0 0 1 -6 6zm6-256h-64v-64h9.632c1.591 0 3.117.632 4.243 1.757l48.368 48.368a6 6 0 0 1 1.757 4.243z"/></svg>
    <span class="sidebar-label">
        {{ __("Activity Logs") }}
    </span>
</router-link>
