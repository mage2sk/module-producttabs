# Panth Product Tabs

[![Magento 2.4.4 - 2.4.8](https://img.shields.io/badge/Magento-2.4.4%20--%202.4.8-orange)]()
[![PHP 8.1 - 8.4](https://img.shields.io/badge/PHP-8.1%20--%208.4-blue)]()
[![License: Proprietary](https://img.shields.io/badge/License-Proprietary-red)]()

Product detail page tab customization for Magento 2. Supports
horizontal/vertical tab styles, fade/slide/none animations, mobile
accordion, custom CMS block tabs, custom attribute tabs, sticky
navigation, lazy-loaded reviews, and deep linking. Compatible with
both Hyva and Luma themes.

---

## Features

- **Horizontal & Vertical tab layouts** — choose the style that fits
  your storefront design.
- **Fade, Slide, None animations** — smooth transitions between tab
  panels.
- **Mobile accordion or scroll** — responsive behavior optimized for
  mobile devices.
- **Custom CMS Block Tabs** — add unlimited tabs that render CMS block
  content, all configurable from the admin panel.
- **Custom Attribute Tabs** — display product attribute values in a
  styled table within their own tab.
- **Tab visibility & labels** — show/hide Description, More Information,
  and Reviews tabs independently, with custom label overrides.
- **Configurable sort order** — control the display order of each tab.
- **Sticky tab navigation** — keep the tab bar visible while scrolling.
- **Lazy-loaded reviews** — defer Reviews tab initialization for faster
  page loads.
- **Deep linking** — URL hash support for linking directly to a
  specific tab (e.g. `#reviews`).
- **Review count badge** — shows approved review count in the tab
  label.
- **Widget support** — embed Product Tabs via CMS pages and blocks.
- **Hyva & Luma dual support** — separate Alpine.js and vanilla JS
  templates with automatic theme detection.

---

## Installation

```bash
composer require mage2kishan/module-producttabs
bin/magento module:enable Panth_ProductTabs
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
bin/magento cache:flush
```

### Verify

```bash
bin/magento module:status Panth_ProductTabs
# Module is enabled
```

---

## Requirements

| | Required |
|---|---|
| Magento | 2.4.4 — 2.4.8 (Open Source / Commerce / Cloud) |
| PHP | 8.1 / 8.2 / 8.3 / 8.4 |
| Dependencies | mage2kishan/module-core ^1.0 |

---

## Configuration

Navigate to **Stores > Configuration > Panth Extensions > Product Tabs**.

### General Settings

| Setting | Default | Description |
|---|---|---|
| Enable Module | Yes | Enable or disable the Product Tabs module |
| Sticky Tab Navigation | No | Make tab navigation sticky on scroll |
| Lazy Load Reviews | No | Defer Reviews tab JS until the tab is clicked |
| Default Open Tab | First Available Tab | Which tab opens by default on page load |

### Design Settings

| Setting | Default | Description |
|---|---|---|
| Tab Style | Horizontal | Horizontal (top) or Vertical (side) tab layout |
| Animation Type | Fade | Animation effect when switching tabs |
| Mobile Behavior | Accordion | Accordion or horizontal scroll on mobile |
| Open First Tab by Default | Yes | Auto-open first tab on page load |
| Accordion on Mobile | Yes | Use accordion layout on mobile devices |

### Tab Labels, Visibility & Sort Order

Customize labels, show/hide individual tabs, and control display order
for Description, More Information, and Reviews tabs.

### Custom CMS Block Tabs

Add unlimited custom tabs that render CMS block content. Each tab
supports: enabled toggle, custom title, CMS block identifier, icon
class, and sort order.

### Custom Attribute Tabs

Add custom tabs that display product attribute values in a table.
Specify comma-separated attribute codes per tab, with custom title,
icon class, and sort order.

---

## Support

| Channel | Contact |
|---|---|
| Email | kishansavaliyakb@gmail.com |
| Website | https://kishansavaliya.com |
| WhatsApp | +91 84012 70422 |

---

## License

Proprietary — see `LICENSE.txt`. Distributed exclusively through the
Adobe Commerce Marketplace.

---

## About the developer

Built and maintained by **Kishan Savaliya** at **Panth Infotech** —
https://kishansavaliya.com. Builds high-quality, security-focused
Magento 2 extensions and themes for both Hyva and Luma storefronts.
