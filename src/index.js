const { registerBlockType } = wp.blocks;

registerBlockType("olt/show-date", {
  // built-in attributes
  title: "Show Dates",
  description: "Block to generate a show dates tickets links",
  icon: "format-image",
  catgeory: "widgets",

  // custom attributes
  attributes: {
    date: {
      type: "string",
    },
    ticketUrl: {
      type: "string",
    },
  },
  // custom functions

  // built-in functions
  edit({ attributes, setAttributes }) {
    function updateDate(event) {
      setAttributes({
        date: event.target.value
      });
    }
    return (
      <div><label>Date: <input
        type="datetime-local"
        value={attributes.date || new Date()}
        onChange={updateDate}
      /></label></div>
    );
  },
  save({attributes}) {
    return <ul>
      <li>{attributes.date}</li>
    </ul>;
  },
});
