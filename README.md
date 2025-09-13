# Promotional Banner Elementor Addon

A custom Elementor widget that creates beautiful promotional banners with a left image and right content layout, perfectly matching modern design standards.

## Features

- **Responsive Design**: Automatically adapts to different screen sizes
- **Purple Theme**: Matches the design from your reference image
- **Customizable Content**: Easily edit heading, description, and button text
- **Full Control**: Complete styling options for colors, typography, spacing
- **Modern Layout**: Left image with right-aligned content section
- **Call-to-Action Button**: Full-width button with hover effects and arrow icon
- **Elementor Integration**: Seamless integration with Elementor's interface

## Installation

1. **Upload the Plugin**:
   - Download or clone this repository
   - Upload the entire `elementor-addon` folder to your `/wp-content/plugins/` directory
   - Or zip the folder and upload via WordPress admin panel

2. **Activate the Plugin**:
   - Go to WordPress Admin → Plugins
   - Find "Promotional Banner Elementor Addon" and click "Activate"

3. **Requirements**:
   - WordPress 5.0+
   - Elementor 3.0.0+
   - PHP 7.4+

## Usage

1. **Edit with Elementor**:
   - Open any page/post with Elementor
   - Search for "Promotional Banner" in the widget panel
   - Drag and drop the widget to your desired location

2. **Configure Content**:
   - **Banner Image**: Upload your promotional image (left side)
   - **Heading**: Add your main title (e.g., "55 ETSY VIDEO TEMPLATES")
   - **Description**: Add descriptive text
   - **Button Text**: Set your call-to-action text
   - **Button Link**: Add the destination URL

3. **Customize Styling**:
   - **Container**: Background color, padding, borders, border radius
   - **Heading**: Color, typography, margins
   - **Description**: Color, typography, margins  
   - **Button**: Colors, typography, padding, border radius, hover effects

## Design Specifications

The widget matches the provided design with:
- **Layout**: 50/50 split between image and content on desktop
- **Colors**: Purple theme (#8B4CB8) for heading and button
- **Typography**: Bold uppercase heading, readable description text
- **Button**: Full-width with arrow icon and hover effects
- **Responsive**: Stacks vertically on mobile devices

## Customization

### Default Colors
- **Primary Purple**: `#8B4CB8`
- **Hover Purple**: `#7A3FA0`
- **Text Color**: `#555555`
- **Background**: `#ffffff`

### CSS Classes
- `.promo-banner-container` - Main container
- `.promo-banner-wrapper` - Flex wrapper
- `.promo-banner-image` - Image section
- `.promo-banner-content` - Content section
- `.promo-banner-heading` - Main heading
- `.promo-banner-description` - Description text
- `.promo-banner-button` - CTA button

## Browser Support

- Chrome/Edge 88+
- Firefox 78+
- Safari 14+
- Mobile browsers (iOS Safari, Chrome Mobile)

## Accessibility Features

- Proper heading hierarchy
- Keyboard navigation support
- High contrast mode support
- Reduced motion support
- Screen reader friendly
- Focus indicators

## File Structure

```
elementor-addon/
├── promo-banner-elementor.php          # Main plugin file
├── widgets/
│   └── promotional-banner.php          # Widget class
├── assets/
│   └── css/
│       └── promo-banner.css           # Widget styles
├── .github/
│   └── copilot-instructions.md        # Development instructions
└── README.md                          # This file
```

## Hooks and Filters

The plugin provides several hooks for developers:

### Actions
- `promo_banner_before_render` - Before widget renders
- `promo_banner_after_render` - After widget renders

### Filters
- `promo_banner_default_settings` - Modify default widget settings
- `promo_banner_css_classes` - Add custom CSS classes

## Troubleshooting

### Common Issues

1. **Widget not appearing**:
   - Ensure Elementor is installed and activated
   - Check Elementor version (3.0.0+ required)
   - Clear any caching plugins

2. **Styles not loading**:
   - Clear browser cache
   - Regenerate Elementor CSS files
   - Check file permissions

3. **Responsive issues**:
   - Check if theme has conflicting CSS
   - Test with a default theme
   - Clear Elementor cache

## Support

For support and customization requests, please:
1. Check this README file
2. Review the widget settings in Elementor
3. Test with default WordPress theme

## Uninstallation

### Complete Data Removal

This plugin includes comprehensive uninstall functionality to ensure complete data cleanup:

#### Automatic Cleanup (When Plugin is Deleted)

When you delete the plugin through WordPress admin, the following data is automatically removed:

**Database Cleanup**:
- All plugin options and settings
- Transients and cached data
- User meta data related to the plugin
- Site transients (multisite compatible)

**File System Cleanup**:
- Plugin-specific uploaded files (if any)
- Generated cache files
- Temporary data

**Elementor Integration Cleanup**:
- Clears Elementor cache and generated files
- Removes widget-specific cached data

#### Manual Uninstall Steps

1. **Deactivate the Plugin**:
   - Go to Plugins → Installed Plugins
   - Find "Promotional Banner Elementor Addon"
   - Click "Deactivate"

2. **Delete the Plugin**:
   - After deactivation, click "Delete"
   - Confirm deletion
   - All plugin data will be automatically removed

#### Multisite Networks

For WordPress multisite installations, the uninstall process:
- Cleans data from all sites in the network
- Removes network-wide settings
- Ensures complete cleanup across all subsites

#### What Gets Preserved

The following items are **NOT** removed during uninstall (to preserve your content):
- Pages/posts created with the widget (content remains but widget becomes inactive)
- Images uploaded through the widget (remain in Media Library)
- Elementor pages containing the widget (widget content becomes static)

#### Complete Removal Verification

After uninstallation, you can verify complete removal by:
1. Checking WordPress options table for any `promo_banner_elementor_*` entries
2. Verifying no transients remain in the database
3. Confirming plugin directory is completely removed

**Note**: The uninstall process is irreversible. Make sure to backup your site before uninstalling if you plan to reinstall later.

## Changelog

### Version 1.0.0
- Initial release
- Complete promotional banner widget
- Responsive design
- Full Elementor integration
- Purple theme matching reference design

## License

This plugin is released under the GPL v2 or later license.

---

**Note**: Replace placeholder images with your actual promotional images for best results. The widget is designed to work with landscape-oriented images for the left section.
