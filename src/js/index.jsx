import React from 'react';
import { createRoot } from 'react-dom/client';

import StickyNav from './StickyNav';

const domnode = document.getElementById('stickyNav');
const root = createRoot(domnode);

root.render(<StickyNav />);
