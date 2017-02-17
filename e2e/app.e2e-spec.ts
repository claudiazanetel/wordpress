import { WpAngular2ThemePage } from './app.po';

describe('wp-angular2-theme App', () => {
  let page: WpAngular2ThemePage;

  beforeEach(() => {
    page = new WpAngular2ThemePage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
