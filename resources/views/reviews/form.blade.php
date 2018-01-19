<div class="field">
    <label class="label">Rating</label>
  <div class="control">
    <div class="select is-primary">
      <select name="rating">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
      </select>
    </div>
  </div>
</div>

<div class="field">
    <label class="label">Title</label>
    <div class="control">
        <input class="input" type="text" name="title" placeholder="e.g. ABSOLUTE MASTERPIECE">
    </div>
</div>

<div class="field">
    <label class="label">Review</label>
    <div class="control">
        <textarea class="textarea" name="body" placeholder="Write your review here"></textarea>
    </div>
</div>

<div class="control">
    <button class="button is-primary">{{ $submitText}}</button>
</div>