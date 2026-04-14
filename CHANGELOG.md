# Changelog

All notable changes to this extension are documented here. The format
is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/).

## [1.1.0] — Custom CMS & Attribute Tabs

### Added
- **Custom CMS Block Tabs** — add unlimited tabs that render CMS block
  content, configured from admin under Product Tabs > Custom CMS Block
  Tabs.
- **Custom Attribute Tabs** — add tabs that display product attribute
  values in a styled table, configured from admin under Product Tabs >
  Custom Attribute Tabs.
- **Sticky Tab Navigation** — optional sticky positioning for the tab
  nav bar on scroll (configurable via admin).
- **Lazy Load Reviews** — defer Reviews tab JS initialization until the
  tab is clicked, improving initial page load performance.
- **Default Tab Selection** — admin setting to choose which tab opens
  by default (first, description, more info, or reviews).
- **Mobile Behavior** — choose between accordion or horizontal scroll
  tab strip on mobile devices.
- **Tab Icons** — SVG icons for each tab type; custom icon class
  support (Bootstrap Icons) for CMS and attribute tabs.
- **Deep Linking** — URL hash-based deep linking to specific tabs
  (e.g. `#reviews`, `#description`).

### Changed
- Improved tab sorting with configurable sort order per tab type.
- Enhanced mobile accordion styling with smooth transitions.

---

## [1.0.0] — Initial release

### Added
- **Horizontal and Vertical tab styles** — configurable via admin.
- **Fade, Slide, None animation types** — smooth transitions between
  tab panels.
- **Tab visibility controls** — show/hide Description, More Information,
  and Reviews tabs independently.
- **Custom tab labels** — override default tab labels from admin.
- **Tab sort order** — control display order of each tab type.
- **Accordion on mobile** — responsive accordion layout for mobile
  devices.
- **First tab open by default** — configurable auto-open behavior.
- **Hyva and Luma support** — separate templates for Hyva (Alpine.js)
  and Luma (vanilla JS) themes with automatic detection.
- **Widget support** — Product Tabs widget for CMS pages and blocks.
- **Review count badge** — shows approved review count in tab label.
- Unit tests for Block, Helper, and Source Model classes.

### Compatibility
- Magento Open Source / Commerce / Cloud 2.4.4 — 2.4.8
- PHP 8.1, 8.2, 8.3, 8.4

---

## Support

For all questions, bug reports, or feature requests:

- **Email:** kishansavaliyakb@gmail.com
- **Website:** https://kishansavaliya.com
- **WhatsApp:** +91 84012 70422
