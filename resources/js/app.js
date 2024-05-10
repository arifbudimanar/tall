import "./bootstrap";

// Import Toaster
import "../../vendor/masmerise/livewire-toaster/resources/js";

// Import Trix
import "trix";
import "trix/dist/trix.css";

// Import FilePond
import * as FilePond from "filepond";
import "filepond/dist/filepond.min.css";
import "filepond/dist/filepond.min.js";

// Import the FilePond plugin
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";

window.FilePond = FilePond;
FilePond.registerPlugin(
    FilePondPluginFileValidateType,
    FilePondPluginFileValidateSize,
    FilePondPluginImagePreview
);
