# Scrollify Snap Scroll by WinstonDev

This WordPress plugin enhances the scrolling experience by implementing **Scrollify** to add snap scrolling between sections. The plugin automatically applies smooth snap scrolling to any section that contains the word `snap` in its class name. 

## Features

- **Scroll Snap**: Smooth scrolling between sections with the `snap` class.
- **Elementor Compatibility**: The plugin is optimized to work with Elementor's sections, avoiding hidden sections (e.g., those hidden on mobile or tablet).
- **Visibility Checks**: Ensures that Scrollify only scrolls to visible sections.
- **Screen Size Detection**: Automatically disables Scrollify on smaller screens (like mobile), ensuring a better experience on touch devices.
- **Touch Support**: Supports smooth scrolling on mobile and tablet when enabled.

## Requirements

- WordPress 4.0 or higher
- jQuery (Scrollify relies on jQuery)
- Elementor (optional but recommended)

## Installation

1. **Upload the plugin**:
    - Download the repository or clone it to your WordPress installation directory.
    - Upload the plugin files to the `/wp-content/plugins/scrollify-snap-scroll/` directory, or install the plugin through the WordPress plugins screen.

2. **Activate the plugin**:
    - Activate the plugin through the 'Plugins' screen in WordPress.

3. **Add the `snap` class to your sections**:
    - In your Elementor editor or WordPress theme, add the class `snap` to the sections where you want to apply the scroll snap effect.

4. **Configure your Elementor sections**:
    - Ensure that the sections are not hidden based on the device visibility settings (e.g., desktop, tablet, or mobile).

## How It Works

- The plugin uses **Scrollify** to add a snap scroll effect between sections.
- It automatically looks for all elements with a class that contains the word `snap` and applies smooth scrolling between these sections.
- The plugin disables Scrollify on screen sizes smaller than 768px to avoid issues on mobile devices.
- **Elementor compatibility**: Scrollify will ignore sections that are hidden for mobile, tablet, or desktop using Elementor's `elementor-hidden` classes. This prevents issues when scrolling between visible and hidden sections.

## Configuration Options

The plugin currently does not provide a UI for configuration, but the behavior can be customized by modifying the JavaScript in `scrollify_snap_enqueue_scripts()` inside the plugin file. The following customizations are possible:

- **Scroll speed**: The speed of the scroll can be adjusted by modifying the `scrollSpeed` property.
- **Enable/Disable on small screens**: You can change the breakpoint (768px) to any other value depending on your design requirements.
- **Handling hidden sections**: Modify or extend the `interstitialSection` option to handle other cases where sections might be hidden.

## Example Usage

Here's how you can apply the scroll snap effect to your Elementor sections or any other theme sections:

### Elementor Example

1. Open the section settings in Elementor.
2. In the **Advanced** tab, add the class `snap` to the **CSS Classes** field.

### Custom HTML Example

```html
<div class="snap">
    <h2>Section 1</h2>
    <p>Some content...</p>
</div>

<div class="snap">
    <h2>Section 2</h2>
    <p>Some content...</p>
</div>

<div class="snap">
    <h2>Section 3</h2>
    <p>Some content...</p>
</div>
